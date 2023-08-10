<nav class="navbar bg-primary w-full" id="blade-navbar">
    <div class="navbar__container h-16">
        <ul class="navbar__items">
            <li class="navbar__items__item">
                <!-- Navigation Links -->
                <a href="{{ route('dashboard') }}" active="{{ request()->routeIs('dashboard') }}" class="text-theme">
                    <img class="block w-8 h-8 lg:w-16 lg:h-16" src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </li>
            <li class="navbar__items__item text-md lg:text-xl">
                <!-- Navigation Links -->
                <a href="{{ route('localisation') }}" active="{{ request()->routeIs('localisation') }}" class="text-theme flex items-center">
                    Localisation
                    <img src="{{ asset('images/icons/gps.gif') }}" alt="GPS Icon" class="w-6 h-6 lg:w-12 lg:h-12 mr-2">
                </a>
            </li>
            <li class="navbar__items__item text-md lg:text-xl">
                <!-- Navigation Links -->
                <a href="{{ route('showcase') }}" active="{{ request()->routeIs('showcase') }}" class="text-theme flex items-center">
                    Vitrine client                    
                </a>
            </li>
        </ul>

        <div class="mx-2">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn bg-yellow-300 text-dark hover:bg-yellow-400 btn-sm">
                    {{ __('Se déconnecter') }}
                </button>
            </form>
        </div>
    </div>
</nav>
