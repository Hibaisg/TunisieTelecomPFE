<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}- @yield('title')</title>

        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{asset ('admin/assets/img/karate.png') }}" rel="icon">
        <link href="{{asset ('admin/assets/img/karate.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

          <!-- Vendor CSS Files -->
        <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @vite([ 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Header -->
            @include('layouts.partials.header')

            <!-- Side Bar -->
            @include('layouts.partials.sidebar')

            <!-- Main Div for content -->
            @include('layouts.partials.main')

            <!-- Footer -->
            @include('layouts.partials.footer')

        </div>

        <!-- Vendor JS Files -->
        <script src="{{asset('admin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/chart.js/chart.umd.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('admin/assets/vendor/php-email-form/validate.js')}}"></script>

        <!-- Template Main JS File -->
        <script src="{{asset('admin/assets/js/main.js')}}"></script>
    </body>
</html>
