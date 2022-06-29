<x-app-layout>
@section('content')
<nav class="navbar navbar--light">
    <ul class="navbar__items">
        <li class="navbar__items__item" :class="[isActiveRoute('/')]">
            <router-link class="nav-link" to="/" aria-current="page">Base64</router-link>
        </li>
        <li class="navbar__items__item" :class="[isActiveRoute('/about')]">
            <router-link class="nav-link" to="/about" aria-current="page">About me</router-link>
        </li>
        <li class="navbar__items__item" :class="[isActiveRoute('/contact')]">
            <router-link class="nav-link" to="/contact" aria-current="page">Contact</router-link>
        </li>
    </ul>
</nav>
<router-view></router-view>
@endsection
</x-app-layout>
