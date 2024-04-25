<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- favicon png -->
        <link rel="icon" type="image/png" href="storage/img/logo-noir.png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://use.typekit.net/oap7kyb.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!-- Scripts -->
        <link rel="stylesheet" href="storage/css/app.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        

        <!-- Styles -->
        @yield('styles')
    </head>
    <body class="font-sans antialiased">
        <!-- Page Heading -->
        
        
        <!-- Page Content -->
        <main class="flex-col">
            <section id="landing" style="background: linear-gradient(90deg, rgb(0,0,0,0.5) 60%, rgb(0,0,0,0.0)) 100%, url('@yield('landing-background')') no-repeat center center / cover fixed;">
            <nav class="header">
                <a href="/"><img src="../storage/img/logo.png" alt=""></a>
                <ul>
                    <li><a href="/about" class="button">Programme</a></li>
                    <li><a href="/about" class="button">Présentation</a></li>
                    <li><a href="/contact" class="button">Contact</a></li>
                    <li><a href="/billeterie" class="button">Billeterie</a></li>
                </ul>
                <ul>
                    <li><a href="/login" class="button">Se connecter</a></li>
                    <li><a href="/register" class="button">Créer un compte</a></li>
                </ul>
            </nav>
                @yield('landing')
            </section>
            
                @include('layouts.header')
                @yield('content')
        </main>
        <script src="storage/js/app.js"></script>
    </body>
</html>
