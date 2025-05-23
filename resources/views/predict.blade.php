<x-app-layout> <x-slot name="header"> <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> {{ __('Prediction') }} </h2> </x-slot>
<div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Importer un fichier CSV pour la prédiction du risque de churn</h2>

            @if (session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="file" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Choisir un fichier CSV</label>
                    <input type="file" name="file" id="file" accept=".csv"
                    class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" style="background-color: rgb(0, 142, 207); color: white; padding: 10px 20px; border-radius: 5px;"> Prédire </button>

                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
