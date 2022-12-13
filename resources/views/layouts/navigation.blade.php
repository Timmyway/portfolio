<nav class="navbar bg-primary fixed top-0 left-0 w-full" id="blade-navbar">
    <div class="navbar__container">
        <ul class="navbar__items">
            <li class="navbar__items__item ">
                <!-- Navigation Links -->
                <a :href="{{ route('dashboard') }}" active="{{ request()->routeIs('dashboard') }}" class="text-theme">
                    Timmy Way
                </a>
            </li>
        </ul>

        <div class="mx-2">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn bg-orange-600 hover:bg-orange-700 btn-sm">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</nav>
