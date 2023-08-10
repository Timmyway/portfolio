<x-app-layout>
    @slot('vite')    
    @vite(['resources/sass/app.scss'])
    <style>
    html, body {
        height: 100%;
        margin: 0;
    }
    #map {
        /* max-height: 800px; */
    }
    </style>
    @endslot
    
    @section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold text-center mb-4">Vitrine client</h1>
        
    </div>
    @endsection
    @slot('scripts')
    @vite(['resources/js/appShowcase.js'])
    @endslot
    </x-app-layout>