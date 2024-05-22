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
    <section ref="portfolioHero" id="portfolio-hero" class="mx-auto">
        <div class="lg:grid lg:grid-cols-2">
            <div class="bg-secondary py-8 px-8 flex flex-col justify xl:py-16 xl:px-4">
                <wt-typewriter
                    sentence="Bienvenue sur mon portfolio"
                    class="text-2xl xl:text-4xl"
                ></wt-typewriter>
                <h2 class="text-4xl xl:text-6xl my-2 lg:my-4 lg:text-6xl">Tim <span class="text-white text-4xl xl:text-6xl">W</span>ay <i class="fa-solid fa-code text-primary"></i></h2>
                <h2 class="text-4xl xl:text-4xl my-2 lg:my-4 lg:text-6xl">Développeur</h2>
                <h2 class="text-2xl text-white lg:text-4xl mb-4">WEB</h2>

                <router-link to="/a-propos">
                    <button
                        class="btn btn-primary py-4 px-8 w-fit mt-12"
                        style="margin-bottom: 0;"

                    >À PROPOS DE MOI</button>
                </router-link>
            </div>
            <div class="bg-primary">
                <img src="images/bg.WebP" alt="" class="h-full object-cover">
            </div>
        </div>
    </section>

    <section class="flex justify-center">
        <div class="flex justify-center flex-wrap relative top-[-30px] p-4 bg-slate-50 shadow-xl">
            <article class="animate__animated animate__swing animate__slow p-8 flex flex-col items-center text-center lg:border-r-2 border-solid border-gray-400">
                <wt-stat
                    class="text-6xl"
                    :stat="calculateXp('2016-11-02').years"
                ></wt-stat
                >
                <p class="text-xl">
                    années d'expérience
                </p>
            </article>
            <article class="animate__animated animate__swing p-8 flex flex-col items-center text-center lg:border-r-2 border-solid border-gray-400">
                <wt-stat class="text-6xl" :stat="50" :speed="50"></wt-stat>
                <p class="text-xl">
                    projets et plus réalisés
                </p>
            </article>
            <article class="animate__animated animate__swing animate__slow p-8 flex flex-col items-center text-center">
                <wt-stat class="text-6xl" :stat="3"></wt-stat>
                <p class="text-xl">
                    langages de programmation
                </p>
            </article>
        </div>
    </section>

    <section ref="portfolioService" id="portfolio-service" class="bg-slate-900 py-6 flex flex-col lg:py-12 2xl:py-24">
        <h3 class="text-3xl font-bold text-white pb-4 text-center font-secondary 2xl:text-5xl lg:pb-12">
            Ce que j'aime ?
        </h3>
        <div class="flex flex-wrap justify-center gap-8">
            <article class="grid grid-cols-1 justify-center text-center mx-2 lg:text-left lg:grid-cols-4 max-w-lg border-4 rounded-lg border-gray-200 py-2 px-2">
                <div class="lg:col-span-1 p-4">
                    <i class="fa-solid fa-desktop text-4xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 lg:col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Créer des Landing Pages optimisées pour boster vos conversions</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Boostez vos conversions avec des landing pages modernes et responsive.
                        Je conçois des pages d'atterrissage captivantes pour engager votre audience
                        et maximiser vos résultats.
                    </p>
                </div>
            </article>

            <article class="grid grid-cols-1 justify-center text-center mx-2 lg:text-left lg:grid-cols-4 max-w-lg border-4 rounded-lg border-gray-200 py-2 px-2">
                <div class="lg:col-span-1 p-4">
                    <i class="fa-solid fa-cogs text-4xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 lg:col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Mettre en place votre prochain Site Web, Unique et à votre Identité</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Donnez vie à votre vision avec un site web sur mesure qui reflète parfaitement votre marque.
                        Je conçois des sites web fonctionnels et esthétiques pour valoriser votre entreprise.
                    </p>
                </div>
            </article>

            <article class="grid grid-cols-1 justify-center text-center mx-2 lg:text-left lg:grid-cols-4 max-w-lg border-4 rounded-lg border-gray-200 py-2 px-2">
                <div class="lg:col-span-1 p-4">
                    <i class="fa-solid fa-code text-4xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 lg:col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Coder des applications sur mesure et adaptés à vos besoins et ambitions</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        Je crée des solutions personnalisées pour répondre précisément à vos exigences,
                        vous permettant ainsi de tirer pleinement parti de votre potentiel.
                    </p>
                </div>
            </article>

            <article class="grid grid-cols-1 justify-center text-center mx-2 lg:text-left lg:grid-cols-4 max-w-lg border-4 rounded-lg border-gray-200 py-2 px-2">
                <div class="lg:col-span-1 p-4">
                    <i class="fa-solid fa-exchange-alt text-4xl text-secondary"></i>
                </div>
                <div class="flex flex-col gap-4 lg:col-span-3">
                    <h6 class="text-2xl px-2 py-4 font-bold text-white">Développer des API Web Personnalisées à votre Business</h6>
                    <p class="text-xl leading-relaxed text-slate-300">
                        En tant que développeur expérimenté, je crée des interfaces de programmation (aka API) adaptées
                        à vos besoins spécifiques. Bénéficiez d'une connectivité optimale et d'une efficacité
                        maximale pour votre activité en ligne.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section ref="portfolioTech" id="portfolio-tech" class="py-6 lg:py-12 2xl:py-24">
        <h3 class="text-3xl font-bold p-4 mb-6 text-center font-secondary">Mes outils au Quotidien</h3>
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
                identifier="misc"
                title="Autres"
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
import { onMounted, onUnmounted, ref } from 'vue';
import Cards from '../components/Cards.vue';
import { useAppStore } from '../stores/appStore';
// Custom components
import WtChangingText from '../components/portfolio/WtChangingText.vue';
import WtTypewriter from '../components/portfolio/WtTypewriter.vue';
import useIntersectionObserver from '../composables/useIntersectionObserver';
import { calculateXp } from '../helpers/helpers';
import WtStat from '../components/portfolio/WtStat.vue';

const appStore = useAppStore();
const sections = ref(['portfolio-hero', 'portfolio-service', 'portfolio-tech']);
const activeShortcut = ref('portfolio-hero');

// Intesection observer
const portfolioHero = ref(null);
const portfolioService = ref(null);
const portfolioTech = ref(null);

onMounted(() => {
    const elements = [portfolioHero.value, portfolioService.value, portfolioTech.value];
    const { observeTargets, unobserveTargets } = useIntersectionObserver(elements,
        { threshold: 0 },
        { intersect: handleIntersection, unintersect: handleUnintersect }
    );
    observeTargets();
});

function handleIntersection(observable) {
    // Custom logic to handle the intersection
    console.log(`Entries: ${observable} | ${observable.target}`);
    // observable.target.style = "border: 4px solid red";
    // Update the active shortcut menu with the intersecting section
    activeShortcut.value = observable.target.id;
    observable.target.classList.add('section--observed');
    observable.target.classList.remove('section--unobserved');
}

function handleUnintersect(observable) {
    observable.target.classList.remove('section--observed');
    observable.target.classList.add('section--unobserved');
}

function accessShortcut(elementId) {
    const targetElement = document.querySelector('#' + elementId);
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
    z-index: 99;
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

.section--observed {
    border: 2px solid #333;
}
</style>
