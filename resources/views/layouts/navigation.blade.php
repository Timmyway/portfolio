<nav class="navbar bg-primary w-full" id="blade-navbar">
    <div class="navbar__container h-16">
        <ul class="navbar__items">
            <li class="navbar__items__item">
                <!-- Navigation Links -->
                <a href="{{ route('dashboard') }}" active="{{ request()->routeIs('dashboard') }}" class="text-theme">
                    <img class="block h-16" src="{{ asset('images/logo.png') }}" alt="">
                </a>
            </li>
            <li class="navbar__items__item">
                <!-- Navigation Links -->
                <a href="{{ route('localisation') }}" active="{{ request()->routeIs('localisation') }}" class="text-theme">
                    Localisation
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
