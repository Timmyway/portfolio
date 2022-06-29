<nav class="navbar bg-primary">
    <div class="navbar__container">
        <ul class="navbar__items">
            <li class="navbar__items__item">
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
                <button type="submit" class="btn btn-warning btn-sm">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>    
</div>    
</nav>
