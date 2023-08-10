<script setup>
import { ref } from "vue";
import ShowcaseApi from "../api/ShowcaseApi";

const landingPages = ref();

// Fetch landing pages
async function fetchLps() {
    const response = await ShowcaseApi.getLandingpages();
    landingPages.value = response.data;
}

fetchLps();
</script>

<template>
    <section class="p-4">
        <h1 class="bg-primary text-white py-1 rounded text-3xl font-semibold text-center mb-4">Vitrine client</h1>        
        <h3 class="text-2xl font-bold mb-2">Client et fidèle partenaire : Budgetdevis</h3>
        <p class="text-lg leading-loose mb-2">
            Découvrez une sélection exclusive de landing pages réalisées avec succès 
            pour une clientèle de renom au sein de l'écosystème budgetdevis.com. <br>
            Parmi nos réalisations de premier plan figurent des collaborations 
            avec des géants tels qu'Eni, Izi By EDF, Sektor Alarm, Aterno et Allianz.<br> 
            Plongez dans l'univers de l'innovation visuelle et fonctionnelle, 
            où chaque landing page incarne l'essence stratégique de nos partenariats fructueux, 
            apportant une valeur ajoutée exceptionnelle à ces marques de premier plan.
        </p>
        <!-- Landingpages -->
        <div class="flex flex-wrap justify-center gap-2 lg:gap-4 xl:gap-6 m-2">
            <article
                v-for="lp in landingPages" :key="`lp-${lp.id}`"
                class="w-80 shadow--card bg-gradient-to-r from-slate-50 to-slate-200"
            >
                <div class="mb-5">
                    <div class="p-2 lg:p-4">
                        <h6 class="text-2xl font-bold">{{ lp.name }}</h6>
                    </div>
                    <div>
                        <img
                            :src="`${ShowcaseApi.apiUrl}storage/${lp.thumbnail}`" alt=""
                            class="h-40 object-fit w-full"
                        >
                    </div>
                </div>
                <div class="p-4 flex justify-center">
                    <a :href="lp.url" target="_blank">
                        <button
                            class="bg-primary px-5 py-4 rounded text-white uppercase text-xl font-bold shadow-sm ease-in-out duration-150 hover:tracking-wider hover:scale-110"
                        >Visiter</button>
                    </a>
                </div>
            </article>
        </div>
    </section>
</template>

<style lang="scss" scoped>
.shadow--card {
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}
</style>
