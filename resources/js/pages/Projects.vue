<template>
<section class="mt-4 mx-auto">    
    <h1 class="text-6xl p-6 text-center font-bold">Mes réalisations</h1>
    <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
        <!-- Convertisseur -->
        <portfolio-project
            title="1. Outil de conversion"
            description="L'application est un outil de conversion et d'encodage qui offre les fonctionnalités suivantes : conversion entre Base64 et UTF-8, encodage et décodage d'URL, encodage et décodage d'entités HTML. Ces fonctionnalités permettent de manipuler facilement et en toute sécurité les données et les caractères spéciaux, rendant ainsi les interactions en ligne plus efficaces et pratiques."
        >
            <template #project>
                <conversion-tool></conversion-tool>    
            </template>
        </portfolio-project>
    </article>

    <article class="px-4 py-2 mx-2 flex flex-col xl:py-4">
        <!-- Timer application -->
        <portfolio-project
            title="2. Timer"
            class="bg-slate-900 text-white"
        >
            <template #description>
                <div>
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
                <timer-page></timer-page>
            </template>
        </portfolio-project>
    </article>

    <div class="px-4 py-2 mx-2 flex flex-col xl:py-4">
        <h2 class="text-4xl p-6 text-center font-bold">Certains projets dont je suis l'auteur</h2>
        <p class="text-xl">
            Voici un apperçu des mes réalisations personnelles. Je ne peux mettre que des images car certaines ne sont pas des projets WEB mais desktop.
            Et d'autres sont des projets dont je n'ai pas le droit de partager le code source.
        </p>
        <p class="text-sm mt-2">
            Astuce : Double cliquez une image pour l'agrandir.
        </p>    

        <article class="container">
            <h4 class="text-2xl py-4 font-bold">Projet 1 : Teamtool</h4>
            <p class="text-xl mb-4">
                <span class="underline font-bold">Description</span> : ce projet est un client desktop développé avec Python et le framework graphique PYQT.<br>
                Son principal object est l'optimisation de Kit emailing et le routage. <br>
                En effet, il est connecté à une solution de routage et permet d'utiliser tout le potentiel du router sans avoir à ouvrir l'appli WEB à chaque fois.
            </p>
            <wt-carousel-enhanced
                :images="projects.teamtool"
                class="bg-gradient-to-r from-yellow-500 to-orange-300"
            ></wt-carousel-enhanced>
        </article>

        <article class="container mt-5 sm:mt-10">
            <h4 class="text-2xl py-4 font-bold">Projet 2 : Newsletter builder</h4>
            <p class="text-xl mb-4">
                <span class="underline font-bold">Description</span> : ce projet est une boîte à outil permettant la création d'une newsletter email rapidement.<br>
                Il a été développé avec le framework PHP Laravel et le framework javascript VueJS 3.
                Basé sur un système de template, il est possible de modifier le design original afin d'avoir des variations en un temps record. <br>
                Une gallerie d'image est disponible ainsi qu'un éditeur d'image. Une fonction de rognage avancé est également à disposition.
            </p>            
            <wt-carousel-enhanced
                :images="projects.kitbuilder"
                class="bg-gradient-to-r from-pink-50 to-pink-300"
            ></wt-carousel-enhanced>      
        </article> 
    
        <article class="container mt-5 sm:mt-10">
            <h4 class="text-2xl py-4 font-bold">Projet 3 : Image optimizer</h4>
            <p class="text-xl mb-4">
                <span class="underline font-bold">Description</span> : ce projet est un petit mais très utile outil à utiliser au quotidien.<br>
                En effet, il permet de redimentionner en lot des images, et les exporter au format souhaité.<br>
                Les technologies utilisées sont Python et PYQT.
            </p>
            <wt-carousel-enhanced
                :images="projects.imageOptimizer"
                class="bg-gradient-to-r from-teal-50 to-teal-300"
            ></wt-carousel-enhanced>        
        </article> 
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
                <br>
                Encore une fois, merci de visiter mon portfolio et de partager cette aventure avec moi. Je suis impatient de voir ce que l'avenir nous réserve et de continuer à créer des projets exceptionnels.
                <br><br>
                Restez curieux, créatif et inspiré ! 🚀
                <br>
                Bienvenue dans mon univers numérique ! 💻
            </p>
        </div>
    </article>
</section>
</template>

<script setup>
import WtCarousel from '../components/WtCarousel.vue';
import WtCarouselEnhanced from '../components/portfolio/WtCarouselEnhanced.vue';
import PortfolioProject from '../components/PortfolioProject.vue';
import ConversionTool from '../components/ConversionTool.vue';
import TimerPage from './TimerPage.vue';

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