<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <section>
                <div class="login-form">
                    <img class="t-logo" src="{{ asset('images/logo.svg') }}" alt="">
                    <div class="p-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <span class="text-sm">No account ? No problem, you're welcome as a guest : guest@gmail.com | Guest987</span>
                            </div>
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
                                value="Login"
                            >
                        </form>
                    </div>
                </div>
            </section>
        </div>
        
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>