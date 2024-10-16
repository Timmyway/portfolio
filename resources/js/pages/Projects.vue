<template>
<section class="mt-4 mx-auto">
    <wt-hero
        heading="Projets secondaires"
        bg-image="/images/bg-hero-3.WebP"
        blur="sm"
        class="min-h-96"
    >
        <span>
            Il s'agit de projets que j'ai développés pendant mes moments de libre
            et dans un but de perfectionnement.
        </span>
    </wt-hero>
    <div class="bg-gradient-to-r from-gray-300 via-gray-100 to-gray-300 space-y-6 lg:space-y-12 xl:space-y-20">
        <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
            <!-- Convertisseur -->
            <portfolio-project
                title="1. Mindwall"
                description="Découvrez Mindwall, l'outil créatif que j'ai conçu pour participer à la Google Gemini compétition.
                Capturez vos idées, ajoutez textes et images, et laissez l'IA les enrichir. Avec une interface intuitive,
                visualisez et développez vos concepts de manière unique et interactive."
            >
                <template #project>
                    <div class="py-2">
                        <tw-embed-video src="https://www.youtube.com/embed/msmAyW5Yl5U?si=V5GmUxgQmul-_hLo"></tw-embed-video>
                        <div>
                            <h6 class="font-bold text-2xl py-2">Les points clés</h6>
                            <ul class="text-lg flex flex-col gap-2">
                                <li class="ml-4">🔥 Gestion d'un Canvas intéractif avec Vue.js</li>
                                <li class="ml-4">🤖 Intégration avec l'API de Google Gemini</li>
                                <li class="ml-4">🖼️ Intégration de l'API Freepik</li>
                                <li class="ml-4">🔒 Signin with Google</li>
                            </ul>
                        </div>
                    </div>
                </template>
            </portfolio-project>
        </article>

        <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
            <!-- Convertisseur -->
            <portfolio-project
                title="2. Wordcraft"
                description="Découvrez Wordcraft, votre outil ultime pour explorer
                plus de 100 000 mots anglais en un clin d'œil.
                Avec sa recherche ultra-rapide et ses filtres puissants,
                trouvez instantanément les mots qui vous intéressent.
                Créez vos propres playlists de mots pour un apprentissage personnalisé.
                Chaque mot peut être débloqué et enrichi par l'IA, qui vous fournit définitions,
                synonymes, antonymes, mots associés et exemples d'utilisation.
                Transformez votre maîtrise de l'anglais avec Wordcraft et accédez à un univers
                de vocabulaire enrichi."
            >
                <template #project>
                    <div class="py-2">
                        <p class="mt-2">
                            Il est disponible en live <a href="https://wordcraft.devambition.com" target="_blank" class="underline text-blue-600">ici</a>.
                        </p>
                        <div>
                            <h6 class="font-bold text-2xl py-2">Les points clés</h6>
                            <ul class="text-lg flex flex-col gap-2">
                                <li class="ml-4">🔒 Création d'un compte utilisateur</li>
                                <li class="ml-4">🔎 Recherche instantanée sur une base de plus de 100 000 mots</li>
                                <li class="ml-4">🔎 Filtrage avancé et création de playlists de mots personnalisées</li>
                                <li class="ml-4">🤖 Enrichissement de mots par IA (définitions, synonymes, antonymes, exemples, etc.)</li>
                                <li class="ml-4">★ Espace dédié aux verbes irréguliers</li>
                            </ul>
                        </div>
                    </div>
                </template>
            </portfolio-project>
        </article>

        <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
            <!-- Convertisseur -->
            <portfolio-project
                title="3. Outil de conversion"
                description="L'application est un outil de conversion et d'encodage qui offre les
                    fonctionnalités suivantes : conversion entre Base64 et UTF-8, encodage et décodage d'URL,
                    encodage et décodage d'entités HTML. Ces fonctionnalités permettent de manipuler
                    facilement et en toute sécurité les données et les caractères spéciaux,
                    rendant ainsi les interactions en ligne plus efficaces et pratiques."
            >
                <template #project>
                    <conversion-tool></conversion-tool>
                </template>
            </portfolio-project>
        </article>

        <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
            <!-- Timer application -->
            <portfolio-project
                title="4. Timer"
                class="bg-slate-900"
            >
                <template #description>
                    <div class="text-gray-600 leading-loose">
                        <p>L'application est un minuteur réalisé en Vue.js, conçue pour servir de démo et de pratique. Elle offre les fonctionnalités d'un chronomètre et d'un compte à rebours.</p>
                        <h6 class="text-xl font-bold mb-2">Principales fonctionnalités :</h6>
                        <ul class="flex flex-col gap-2 my-4">
                            <li class="text-xl"><i class="fas fa-star text-yellow-500"></i> Chronomètre : Permet de mesurer le temps écoulé depuis le début du compte à rebours.</li>
                            <li class="text-xl"><i class="fas fa-star text-yellow-500"></i> Compte à rebours : Permet de définir une durée spécifique et de compter à rebours jusqu'à zéro.</li>
                            <li class="text-xl"><i class="fas fa-star text-yellow-500"></i> Contrôles : L'application propose des boutons pour gérer le minuteur, y compris play (démarrer), pause, stop (remise à zéro), et reprendre (continuer à partir du temps en pause).</li>
                        </ul>
                        <p>
                            Cette application constitue une excellente occasion de mettre en pratique les compétences en Vue.js et offre une démonstration des fonctionnalités essentielles d'un minuteur interactif.
                        </p>
                    </div>
                </template>
                <template #project>
                    <div class="py-4 lg:py-12">
                        <timer-page></timer-page>
                    </div>
                </template>
            </portfolio-project>
        </article>
    </div>

    <div class="px-4 py-2 mx-2 my-6 flex flex-col xl:py-4 2xl:my-12">
        <wt-hero
            heading="Certains projets dont je suis l'auteur"
            bg-image="/images/bg-hero-2.WebP"
            blur="xs"
            class="min-h-96"
            text-class="text-center"
        >
            <div class="flex justify-center flex-col items-center gap-4">
                <span>
                    Voici un apperçu des mes réalisations personnelles. Je ne peux mettre que des images car certaines ne sont pas des projets WEB mais desktop.
                    Et d'autres sont des projets dont je n'ai pas le droit de partager le code source.
                </span>
                <p class="text-sm py-2 bg-indigo-800 w-fit px-4 text-white my-2 rounded-sm">
                    <i class="fas fa-lightbulb text-yellow-400"></i>
                    Astuce : Cliquez une image pour l'agrandir.
                </p>
            </div>
        </wt-hero>

        <div class="bg-gradient-to-r from-gray-300 via-gray-100 to-gray-300 space-y-6 lg:space-y-12 xl:space-y-20">
            <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
                <div class="portfolio-project">
                    <h4 class="text-2xl py-4 font-bold">Projet 1 : Teamtool</h4>
                    <p class="text-xl mb-4">
                        <span class="underline font-bold">Description</span> : ce projet est un client desktop développé avec Python et le framework graphique PYQT.<br>
                        Son principal object est l'optimisation de Kit emailing et le routage. <br>
                        En effet, il est connecté à une solution de routage et permet d'utiliser tout le potentiel du router sans avoir à ouvrir l'appli WEB à chaque fois.
                    </p>
                    <div class="py-4 2xl:py-6">
                        <wt-carousel-enhanced
                            :images="projects.teamtool"
                            class="bg-gradient-to-r from-yellow-300 via-orange-100 to-orange-400"
                        ></wt-carousel-enhanced>
                    </div>
                </div>
            </article>

            <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
                <div class="portfolio-project">
                    <h4 class="text-2xl py-4 font-bold">Projet 2 : Newsletter builder</h4>
                    <p class="text-x py-4">
                        <span class="underline font-bold">Description</span> : ce projet est une boîte à outil permettant la création d'une newsletter email rapidement.<br>
                        Il a été développé avec le framework PHP Laravel et le framework javascript VueJS 3.
                        Basé sur un système de template, il est possible de modifier le design original afin d'avoir des variations en un temps record. <br>
                        Une gallerie d'image est disponible ainsi qu'un éditeur d'image. Une fonction de rognage avancé est également à disposition.
                    </p>
                    <div class="py-4 2xl:py-6">
                        <wt-carousel-enhanced
                            :images="projects.kitbuilder"
                            class="bg-gradient-to-r from-pink-300 via-pink-100 to-pink-400"
                        ></wt-carousel-enhanced>
                    </div>
                </div>
            </article>

            <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
                <div class="portfolio-project">
                    <h4 class="text-2xl py-4 font-bold">Projet 3 : Image optimizer</h4>
                    <p class="text-xl py-4">
                        <span class="underline font-bold">Description</span> : ce projet est un petit mais très utile outil à utiliser au quotidien.<br>
                        En effet, il permet de redimentionner en lot des images, et les exporter au format souhaité.<br>
                        Les technologies utilisées sont Python et PYQT.
                    </p>
                    <div class="py-4 2xl:py-6">
                        <wt-carousel-enhanced
                            :images="projects.imageOptimizer"
                            class="bg-gradient-to-r from-teal-300 via-teal-100 to-teal-400"
                        ></wt-carousel-enhanced>
                    </div>
                </div>
            </article>
        </div>
    </div>

    <article class="py-10">
        <div class="p-5">
            <h6 class="text-2xl font-bold mb-2">Et bien d'autres encore...</h6>
            <p>
                Félicitations pour être arrivé jusqu'à la fin de ma page de projets ! 🎉 J'espère que vous avez apprécié découvrir mes réalisations et que vous avez trouvé des projets qui vous ont inspiré.
                <br>
                C'est avec enthousiasme et passion que j'ai créé chacun de ces projets, en mettant tout mon cœur dans leur conception et leur développement. Mon objectif était de relever des défis, d'apprendre de nouvelles choses et de repousser mes limites créatives à chaque étape du processus.
                <br><br>
                Que vous soyez un recruteur, un collègue développeur, un futur client ou simplement un visiteur curieux, je vous remercie du temps que vous avez consacré à explorer mon portfolio. J'espère que mes projets vous ont donné un aperçu de mes compétences techniques et de ma passion pour le développement web.
                <br><br>
                Si vous avez des questions, des commentaires ou des opportunités de collaboration, n'hésitez pas à me contacter ! Je suis toujours ouvert aux nouvelles idées et aux projets passionnants.
                Restez curieux, créatif et inspiré ! 🚀
                <br>
                Bienvenue dans mon univers numérique ! 💻
            </p>
        </div>
    </article>
</section>
</template>

<script setup>
import WtCarouselEnhanced from '../components/portfolio/WtCarouselEnhanced.vue';
import PortfolioProject from '../components/PortfolioProject.vue';
import ConversionTool from '../components/ConversionTool.vue';
import TwEmbedVideo from '../components/media/TwEmbedVideo.vue';
import TimerPage from './TimerPage.vue';
import WtHero from '../components/portfolio/WtHero.vue';

const projects = {
    "teamtool": [
        {"id": 1, "title": "Interface de routage", "src": "images/projects/teamtool-1.WebP"},
        {"id": 2, "title": "Optimisation Kit email", "src": "images/projects/teamtool-2.WebP"},
        {"id": 3, "title": "Choix de segment", "src": "images/projects/teamtool-3.WebP"},
        {"id": 4, "title": "Client pour l'appli WEB", "src": "images/projects/teamtool-4.WebP"},
    ],
    "kitbuilder": [
        {"id": 1, "title": "Rognage d'image", "src": "images/projects/kb-1.WebP"},
        {"id": 2, "title": "Templates disponibles et utilisables", "src": "images/projects/kb-2.WebP"},
        {"id": 3, "title": "Edition de template", "src": "images/projects/kb-3.WebP"},
        {"id": 4, "title": "Upload d'une Crea (au format zip)", "src": "images/projects/kb-4.WebP"},
        {"id": 5, "title": "Gallerie d'image", "src": "images/projects/kb-5.WebP"},
        {"id": 6, "title": "Éditeur d'image", "src": "images/projects/kb-6.WebP"}
    ],
    "imageOptimizer": [
        {"id": 1, "title": "Réglage et sélection d'images", "src": "images/projects/image-optimizer-1.WebP"},
        {"id": 2, "title": "Traitement", "src": "images/projects/image-optimizer-2.WebP"}
    ],
};
</script>
