<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/tw-favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7f150bd29b.js" crossorigin="anonymous"></script>
        @if(isset($vite))
        {{ $vite }}
        @endif
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
                        <i class="fa-brands fa-github fa-2x mr-2"></i>
                        <span class="underline">Retrouvez moi sur Github<span>
                    </a>
                    <a class="ti-link text-theme" href="https://www.linkedin.com/in/timmyway/" target="_blank">
                        <i class="fa-brands fa-linkedin fa-2x mr-2"></i>
                        <span class="underline">Et sur Linkedin<span>
                    </a>
                </div>
            </div>
        </footer>
        <script>
            /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
            var prevScrollpos = window.pageYOffset;            
            window.onscroll = () => {
                var currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("blade-navbar").style.top = "0";
                    document.getElementById("vue-navbar").style.top = "0";
                } else {
                    document.getElementById("blade-navbar").style.top = "-50px";
                    document.getElementById("vue-navbar").style.top = "-150px";                    
                }
                prevScrollpos = currentScrollPos;
            }
        </script>
    </body>
    @if(isset($scripts))
    {{ $scripts }}
    @endif
</html>
