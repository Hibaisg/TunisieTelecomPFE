<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        try {
            // ======================
            // 1. Configuration
            // ======================
            $pythonPath = 'C:\\Users\\hibag\\AppData\\Local\\Programs\\Python\\Python313\\python.exe';
            $pythonScript = $this->normalizePath(base_path('python/predict.py'));
            $uploadDir = $this->normalizePath(storage_path('app/uploads'));
            $outputDir = $this->normalizePath(storage_path('app/outputs'));

            // ======================
            // 2. File Processing
            // ======================
            if (!file_exists($uploadDir)) mkdir($uploadDir, 0755, true);
            if (!file_exists($outputDir)) mkdir($outputDir, 0755, true);

            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $inputPath = $uploadDir.'\\'.$originalName;
            $outputPath = $outputDir.'\\result_'.$originalName;

            // Convert encoding and delimiters
            $this->preprocessCsv($file, $inputPath);

            // ======================
            // 3. Execute Prediction
            // ======================
            $command = sprintf(
                '%s %s %s %s 2>&1',
                escapeshellarg($pythonPath),
                escapeshellarg($pythonScript),
                escapeshellarg($inputPath),
                escapeshellarg($outputPath)
            );

            exec($command, $outputArray, $returnCode);
            $output = implode("\n", $outputArray);

            Log::info("Prediction Command: ".$command);
            Log::info("Python Output:\n".$output);

            // ======================
            // 4. Handle Results
            // ======================
            if ($returnCode !== 0 || !file_exists($outputPath)) {
                throw new \Exception($this->parseError($output, $inputPath));
            }

            return response()->download($outputPath)
                ->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            Log::error("Prediction Failed: ".$e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    private function preprocessCsv($uploadedFile, $targetPath)
    {
        $content = file_get_contents($uploadedFile->getRealPath());
        
        // Convert encoding if needed
        $encoding = mb_detect_encoding($content, ['ISO-8859-1', 'UTF-8', 'Windows-1252'], true);
        if ($encoding !== 'ISO-8859-1') {
            $content = mb_convert_encoding($content, 'ISO-8859-1', $encoding);
        }
        
        // Normalize line endings and delimiters
        $content = str_replace(["\r\n", "\r"], "\n", $content);
        $content = str_replace(',', ';', $content);
        
        file_put_contents($targetPath, $content);
    }

    private function parseError(string $output, string $filePath): string
    {
        // Common error patterns
        $patterns = [
            '/Missing required columns: (\[.*?\])/' => 'Missing required columns: $1',
            '/Invalid columns:(.*?)\./' => 'Invalid data in columns: $1',
            '/ERROR reading CSV/' => 'Invalid CSV format',
            '/Unicode(.*?)Error/' => 'Encoding error (use ISO-8859-1)',
            '/Model file not found/' => 'System configuration error'
        ];

        foreach ($patterns as $pattern => $message) {
            if (preg_match($pattern, $output, $matches)) {
                return str_replace('$1', $matches[1] ?? '', $message);
            }
        }

        // Fallback: Analyze the file directly
        if (!file_exists($filePath)) {
            return 'File processing failed. Please try again.';
        }

        $content = file_get_contents($filePath);
        if (Str::substrCount($content, ';') < 2) {
            return 'CSV must use semicolons (;) as separators';
        }

        return 'Prediction failed. Please check your file format.';
    }

    private function normalizePath(string $path): string
    {
        return str_replace('/', '\\', $path);
    }
}