<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <style>
        body {
            background-image: url('{{ asset('images/login-bg.WebP')}}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
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
                </div>
            </section>
        </div>       
    </body>
</html>