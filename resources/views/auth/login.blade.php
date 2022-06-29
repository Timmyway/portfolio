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
                    <div class="pa-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="m-form-group mb-2">
                                <input 
                                    type="email" 
                                    class="m-form-control"                     
                                    name="email"
                                >
                                <label>Email *</label>
                            </div>

                            <div class="m-form-group mb-2">
                                <input 
                                    type="password" 
                                    class="m-form-control"
                                    name="password"
                                >
                                <label>Password *</label>
                            </div>

                            <input type="submit" class="btn btn-info text-theme-contrast" value="Login">
                        </form>
                    </div>
                </div>
            </section>
        </div>
        
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>