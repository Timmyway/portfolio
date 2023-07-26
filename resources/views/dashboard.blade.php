<x-app-layout>
@section('content')
<nav id="vue-navbar" class="navbar--light w-full" :class="[isMobile ? 'navbar--mobile' : 'navbar']">
    <div class="navbar__container">
        <ul class="navbar__items" v-if="(isMobile && view.mobileMenu) || !isMobile">
            <li class="navbar__items__item" :class="[isActiveRoute('/')]">
                <router-link class="nav-link" to="/" aria-current="page">Accueil</router-link>
            </li>
            <li class="navbar__items__item" :class="[isActiveRoute('/about')]">
                <router-link class="nav-link" to="/about" aria-current="page">A propos</router-link>
            </li>
            <li class="navbar__items__item" :class="[isActiveRoute('/projects')]">
                <router-link class="nav-link" to="/projects" aria-current="page">Réalisations</router-link>
            </li>
            <li class="navbar__items__item" :class="[isActiveRoute('/contact')]">
                <router-link class="nav-link" to="/contact" aria-current="page">Contact</router-link>
            </li>
        </ul>
        <div class="navbar__menu" v-if="isMobile">
            <i
                class="fas fa-2x text-dark" :class="[view.mobileMenu ? 'fa-times text-danger' : 'fa-bars']"
                v-on:click="view.mobileMenu = !view.mobileMenu"
            ></i>            
        </div>
    </div>
</nav>
<router-view></router-view>
@endsection
</x-app-layout>