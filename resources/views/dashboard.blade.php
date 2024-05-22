<x-app-layout>
@slot('vite')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@endslot
@section('content')
<wt-navbar
    id="vue-navbar"
    :items="navItems"
></wt-navbar>
<router-view></router-view>
@endsection
</x-app-layout>
