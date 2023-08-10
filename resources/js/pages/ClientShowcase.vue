<script setup>
import { computed, ref } from "vue";
import ShowcaseApi from "../api/ShowcaseApi";

const landingPages = ref();

// Fetch landing pages
async function fetchLps() {
    const response = await ShowcaseApi.getLandingpages();
    landingPages.value = response.data;
}

const excludes = ['Formation bureautique', 'Bilan auditif - module de rappel'];
const priorities = ['Eni', 'Alarme - Sector Alarm', 'Aterno', 'Budgetdevis - Assurance', 
    'Allianz', 'Poêle à granulés', 'Loi Pinel'
];

const fiteredLps = computed(() => {
    const filtered = landingPages.value
        ?.filter(lp => !excludes.includes(lp.name)) // Exclude landing pages in the 'excludes' array
        .sort((a, b) => {
            // Sort based on priorities array
            const priorityIndexA = priorities.indexOf(a.name);
            const priorityIndexB = priorities.indexOf(b.name);

            if (priorityIndexA !== -1 && priorityIndexB !== -1) {
                return priorityIndexA - priorityIndexB;
            } else if (priorityIndexA !== -1) {
                return -1;
            } else if (priorityIndexB !== -1) {
                return 1;
            } else {
                return a.name.localeCompare(b.name);
            }
        });

    return filtered;
});

fetchLps();
</script>

<template>
    <section class="p-4">
        <h1 class="bg-primary text-white py-2 rounded text-4xl font-semibold text-center mb-4">Vitrine client</h1>
        <h3 class="text-3xl font-bold mb-2">Client et partenaire : Budgetdevis</h3>
        <p class="text-xl leading-loose mb-5 text-justify">
            Explorez notre sélection exclusive de landing pages de qualité supérieure, 
            conçues pour une clientèle prestigieuse au sein de l'écosystème budgetdevis.com. <br>
            Parmi nos réalisations remarquables, nous avons collaboré avec des leaders de renom 
            tels qu'Eni, Izi By EDF, Sector Alarm, Aterno, Le Comptoir Des Langues et Allianz.<br>

            Chaque landing page incarne une stratégie distinctive, reflétant notre expertise en matière d'innovation visuelle et fonctionnelle. Bien que nous n'ayons pas conçu leurs sites web complets, notre capacité à créer des expériences en ligne de la même envergure est démontrée par les références de ces clients.
        </p>
        <!-- Landingpages -->
        <div class="flex flex-wrap justify-center gap-2 lg:gap-4 xl:gap-6 m-2">
            <article
                v-for="lp in fiteredLps" :key="`lp-${lp.id}`"
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
