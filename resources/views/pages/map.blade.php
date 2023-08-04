<x-app-layout>
@slot('vite')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
    <h1 class="text-3xl font-semibold text-center mb-4">Trouvez-nous facilement - Notre localisation sur la carte</h1>
    <section>
        <div class="grid gap-4 md:grid-cols-2">
            <wt-map id="map"
                :coordinates="[-18.8949, 47.5470]"
                :zoom-level="17"
                h="480px"
                :markers="[
                    {
                        name: 'A',
                        c: [-18.89490841969456, 47.54700318280758],
                        action: 'mark'
                    },
                    {
                        name: 'B',
                        c: [-18.893948749500733, 47.54875113952618],
                        action: 'mark'
                    },
                    {
                        name: 'B',
                        c: [-18.894721314652706, 47.54814509613757],
                        action: 'circle',
                        options: { color: '#F6AA1C', fillColor: '#1F0C6E', radius: 50 },
                        message: `Emplacement approximatif voire fictive pour des raisons évidentes de sécurité`
                    }
                ]"                
            ></wt-map>

            <div class="bg-primary">
                <wt-map id="map-monde"
                    :coordinates="[-18.896532332799612, 47.54567246538432]"
                    :zoom-level="5"
                    h="480px"
                    :markers="[
                        {
                            name: 'A',
                            c: [-18.897843872941987, 47.52984394761726],
                            action: 'circle',
                            options: { color: '#F6AA1C', fillColor: '#20FCB5', radius: 100000 }
                        }                    
                    ]"
                ></wt-map>
            </div>
        </div>
    </section>

    <section>
        <!-- Location Details -->
        <div class="md:w-2/5 p-4 bg-white shadow rounded-lg">
            <h3 class="text-xl font-semibold mb-2">Adresse :</h3>
            <p>Madagascar<br>101, Antananarivo</p>
            <h3 class="text-xl font-semibold mt-4 mb-2">Téléphone :</h3>
            <p>+261 33 41 590 57</p>
            <h3 class="text-xl font-semibold mt-4 mb-2">Email :</h3>
            <p>timmyway@devambition.com</p>
            <h3 class="text-xl font-semibold mt-4 mb-2">Horaires d'ouverture :</h3>
            <p>Lundi - Vendredi : 8h00 - 18h00<br>Samedi - Dimanche : Fermé</p>
            <h3 class="text-xl font-semibold mt-4 mb-2">Accès :</h3>
            <p>Nous sommes facilement accessibles en voiture, en transports en commun, ou à pied.</p>
        </div>
        </div>
        <div class="text-center mt-4">
            <p>N'hésitez pas à nous contacter si vous avez besoin d'aide pour nous trouver. Nous sommes impatients de vous
            accueillir !</p>
        </div>
    </section>
</div>
@endsection
@slot('scripts')
@vite(['resources/js/appLocalisation.js'])
@endslot
</x-app-layout>