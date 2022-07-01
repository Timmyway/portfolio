<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7f150bd29b.js" crossorigin="anonymous"></script>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>       
        @include('layouts.navigation')

        <!-- Page Content -->
        <main id="app">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__column">
                    <span>&copy; Timmyway {{ date("Y") }}</span>
                    <a class="ti-link text-theme" href="https://github.com/Timmyway" target="_blank">
                        <span>Retrouvez moi sur Github<span>                                
                    </a>
                </div>
            </div>
        </footer>        
    </body>
</html>
