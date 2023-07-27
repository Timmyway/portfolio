<template>
<div class="home">
    <div class="shortcut">
        <template v-for="(section,index) in sections" :key="`section-${index}`">
            <div
                class="flex items-center gap-2 cursor-pointer"
                :class="{'shortcut--active': section === activeShortcut}"
                @click="accessShortcut(section)"
            >
                <a
                    class="shortcut__point"                    
                ></a>
                <span class="text-white text-xs capitalize">{{ section.replace('portfolio-', '') }}</span>
            </div>
        </template>        
    </div>    
    <section id="portfolio-hero" class="mx-auto">        
        <div class="lg:grid lg:grid-cols-2">
            <div class="bg-secondary py-16 px-8 xl:py-32 xl:px-4 flex flex-col justify">
                <h3 class="mb-4">
                    <wt-changing-text
                        :texts="['Bienvenue sur mon', 'portfolio']"
                        class="text-4xl xl:text-6xl"
                    ></wt-changing-text>
                </h3>                
                <wt-typewriter
                    sentence="Bienvenue sur mon portfolio"
                    class="text-2xl xl:text-4xl"
                ></wt-typewriter>                
                <h2 class="text-4xl xl:text-6xl">Tim <span class="text-white text-4xl xl:text-6xl">W</span>ay <i class="fa-solid fa-code text-primary"></i></h2>
                <h2 class="text-3xl xl:text-5xl">Développeur</h2>
                <h2 class="text-white text-8xl">WEB</h2>                
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

    <section id="portfolio-service" class="bg-slate-900 py-12 flex flex-col xl:py-24">
        <h3 class="text-5xl font-bold text-white p-4 mb-6 text-center font-secondary">Ce que je fais</h3>
        <div class="flex flex-wrap justify-center">
            <article class="grid grid-cols-4 max-w-lg">
                <div class="col-span-1 p-4">
                    <i class="fa-solid fa-desktop text-7xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Impressionnez avec des Landing Pages Réactives</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Offrez une expérience utilisateur exceptionnelle avec des Landing Pages modernes 
                        et adaptées à tous les appareils. Nous concevons des pages d'atterrissage 
                        efficaces pour captiver votre audience et augmenter vos conversions.
                    </p>
                </div>
            </article>

            <article class="grid grid-cols-4 max-w-lg">
                <div class="col-span-1 p-4">
                    <i class="fa-solid fa-cogs text-7xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Votre Site Web Unique, Votre Identité en Ligne</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Donnez vie à votre vision avec un site web personnalisé qui reflète parfaitement 
                        votre marque. Notre équipe crée des sites web sur mesure, 
                        fonctionnels et esthétiquement agréables pour 
                        mettre en valeur votre entreprise.
                    </p>
                </div>
            </article>

            <article class="grid grid-cols-4 max-w-lg">
                <div class="col-span-1 p-4">
                    <i class="fa-solid fa-code text-7xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Puissantes Apps Web pour Dynamiser Votre Entreprise</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Transformez vos idées en réalité avec nos applications web performantes 
                        et faciles à utiliser. Nous concevons des solutions sur mesure pour 
                        optimiser vos processus et stimuler l'efficacité de votre entreprise.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section id="portfolio-tech" class="py-12 xl:py-24">
        <h3 class="text-5xl font-bold p-4 mb-6 text-center font-secondary">Ma Palette Technologique au Quotidien</h3>
        <article class="flex justify-center flex-wrap gap-4 xl:gap-8">
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
</div>
</template>

<script setup>
import { ref } from 'vue';
import Cards from '../components/Cards.vue';
import { useAppStore } from '../stores/appStore';
// Custom components
import WtChangingText from '../components/portfolio/WtChangingText.vue';
import WtTypewriter from '../components/portfolio/WtTypewriter.vue';

const appStore = useAppStore();
const sections = ref(['portfolio-hero', 'portfolio-service', 'portfolio-tech']);
const activeShortcut = ref('portfolio-hero');

function accessShortcut(elementId) {
    const targetElement = document.querySelector('#' + elementId);
    console.log(targetElement);
    targetElement.scrollIntoView({ behavior: 'smooth' });
    activeShortcut.value = elementId;
}
</script>

<style lang="scss">
.shortcut {
    position: fixed;
    right: 1%;
    top: 60%;
    transform: translate(0, -50%);
    background: hsl(0, 0%, 7%, .3);
    padding: 4px 3px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    &__point {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        display: block;
        background: white;
        cursor: pointer;
        transition: all .2s;
        &:hover {
            transform: scale(2);
        }
    }
}
.shortcut--active {
    span {
        color: yellow!important;
        font-weight: bold;
    }
    a.shortcut__point {
        background: yellow;
        transform: scale(2);
    }    
}
</style>