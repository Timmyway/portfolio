<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/tw-favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">        
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <style>
        body {
            background-image: none;
            background-color: #F1F2F6;
        }
        /* Small image for mobile devices */
        @media only screen and (min-width: 576px) {
            body {
                background-image: url('{{ asset('images/login-bg.WebP')}}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            }
        }
    </style>
    <body>
        <div id="app">
            <section>
                <div class="login-form">
                    <img class="t-logo" src="{{ asset('images/logo.png') }}" alt="">
                    <div class="p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf                            
                            <div class="form-group mb-2">
                                <label class="mb-1" for="field-email">Email *</label>
                                <input 
                                    id="field-email"
                                    type="email" 
                                    class="form-control text-dark"
                                    name="email"
                                    placeholder="Entrez votre adresse email"
                                >                                
                            </div>

                            <div class="form-group mb-6">
                                <label class="mb-1" for="field-password">Password *</label>
                                <input 
                                    id="field-password"
                                    type="password" 
                                    class="form-control text-dark"
                                    name="password"
                                    placeholder="Entrez votre mot de passe"
                                >                                
                            </div>

                            <input type="submit" 
                                class="btn bg-blue-600 hover:bg-blue-700 text-theme" 
                                value="Visiter"
                            >                            
                        </form>
                    </div>
                    <div>
                        <span>
                            Revenir à la <a class="underline hover:text-yellow-400" href="{{ route('dashboard') }}">page d'accueil.</a>
                        </span>
                    </div>
                </div>
            </section>
        </div>       
    </body>
</html>