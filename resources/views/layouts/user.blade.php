<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/oap7kyb.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Scripts -->
        <link rel="stylesheet" href="storage/css/app.css">

        <!-- Styles -->
        @yield('styles')
    </head>
    <body class="font-sans antialiased">
        <!-- Page Heading -->
        
        
        <!-- Page Content -->
        <main class="flex-col">
            
                @include('layouts.header')
                @yield('content')
        </main>
        <script src="storage/js/app.js"></script>
    </body>
</html>