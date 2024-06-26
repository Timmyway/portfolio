<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Mon Portfolio: Tim, Développeur Web Full Stack')</title>
        <meta name="description" content="@yield('description', 'Explorez mon portfolio en tant que développeur web full stack passionné. Découvrez mes projets et compétences en développement web front-end, back-end et API, ainsi que mon engagement à créer des expériences utilisateur exceptionnelles.')">
        <meta name="keywords" content="@yield('keywords', 'portfolio, développeur web, full stack, front-end, back-end, API, expériences utilisateur')">
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/tw-favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">

        @if(isset($vite))
        {{ $vite }}
        @endif
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body id="body">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main id="app">
            @yield('content')
            <button
                v-if="!isTopest"
                class="fixed bottom-2 right-2 z-50 bg-yellow-400 w-8 h-8 rounded-full hover:bg-yellow-500"
                @click.prevent="scrollToElem('body')"
            >
                <i class="fas fa-arrow-up fa-2x"></i>
            </button>
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
            var baseUrl = '{{ $frontUrl }}';
            /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
            // var prevScrollpos = window.pageYOffset;
            // window.onscroll = () => {
            //     var currentScrollPos = window.pageYOffset;
            //     if (prevScrollpos > currentScrollPos) {
            //         // Scroll top
            //         document.getElementById("blade-navbar").style.top = "0";
            //         document.getElementById("vue-navbar").style.top = "0";
            //         document.getElementById("vue-navbar").style.visibility = "visible";
            //     } else {
            //         // Scroll down
            //         document.getElementById("blade-navbar").style.top = "-50px";
            //         document.getElementById("vue-navbar").style.top = "-150px";
            //         document.getElementById("vue-navbar").style.visibility = "hidden";
            //     }
            //     prevScrollpos = currentScrollPos;
            // }
        </script>
    </body>
    @if(isset($scripts))
    {{ $scripts }}
    @endif
</html>
