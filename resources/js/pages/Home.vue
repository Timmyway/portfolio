<template>
    <section class="mx-auto">
        <div class="lg:grid lg:grid-cols-2">
            <div class="bg-secondary py-16 px-8 xl:py-32 xl:px-4 flex flex-col justify">
                <h1 class="text-2xl xl:text-4xl mb-4">Bienvenue sur mon portfolio</h1>
                <h2 class="text-6xl xl:text-8xl">DÉVELOPPEUR <br><span class="text-white text-8xl">WEB</span></h2>
                <p class="leading-8 max-w-3xl text-justify">
                    Bienvenue dans mon univers numérique !
                    Je suis Tim, un développeur fullstack passionné du WEB. 
                    Mon voyage a commencé avec une simple ligne de code en 2016, et depuis, 
                    je n’ai jamais cessé d’apprendre et de créer. 
                    Explorez mes réalisations et plongez-vous dans les projets qui reflètent ma passion 
                    pour la résolution de problèmes et l’innovation. 
                    Rejoignez-moi dans cette aventure technologique, où la créativité et la détermination 
                    s’unissent pour façonner l’avenir numérique. Prêt à explorer le WEB avec moi ?
                </p>
                <button class="btn btn-primary py-4 px-8 w-fit mt-12" style="margin-bottom: 0;">A propos de moi</button>
            </div>
            <div class="bg-secondary">
                <img src="images/bg.WebP" alt="" class="h-full object-cover">
            </div>
        </div>
    </section>    

    <section class="flex justify-center">
        <div class="flex justify-center relative top-[-30px] p-4 bg-slate-50 shadow-xl">
            <article class="p-8 flex flex-col items-center text-center border-r-2 border-solid border-gray-400">
                <h6 class="text-6xl">6</h6>
                <p class="text-xl">
                    années d'expérience
                </p>
            </article>
            <article class="p-8 flex flex-col items-center text-center border-r-2 border-solid border-gray-400">
                <h6 class="text-6xl">50</h6>
                <p class="text-xl">
                    projets et plus réalisés
                </p>
            </article>
            <article class="p-8 flex flex-col items-center text-center">
                <h6 class="text-6xl">3</h6>
                <p class="text-xl">
                    langages de programmation
                </p>
            </article>
        </div>        
    </section>

    <section class="py-12 xl:py-20">
        <article class="flex justify-center flex-wrap gap-4">
            <Cards 
                :cards="appStore.getTech().languages"
                identifier="languages" 
                title="Languages"
                card-width="200px"
                h-align="center"
                bg-class="bg-blue-900"
            ></Cards>
            <Cards 
                :cards="appStore.getTech().frameworks" 
                identifier="frameworks" 
                title="Frameworks"
                card-width="200px"
                h-align="center"
                bg-class="bg-red-900"
            ></Cards>
            <Cards 
                :cards="appStore.getTech().tools" 
                identifier="tools" 
                title="Tools"
                card-width="200px"
                h-align="center"
                bg-class="bg-indigo-900"
            ></Cards>
            <Cards 
                :cards="appStore.getTech().databases" 
                identifier="databases" 
                title="Databases"
                card-width="200px"
                h-align="center"
                bg-class="bg-green-900"
            ></Cards>
        </article>
    </section>
</template>

<script setup>
import Cards from '../components/Cards.vue';
import { useAppStore } from '../stores/appStore';

const appStore = useAppStore();
</script>