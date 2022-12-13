<template>
<section class="container mt-4 mx-auto p-4">
    <h1 class="text-4xl p-6 text-center font-bold">Mes réalisations</h1>
    <p class="text-xl">
        Voici un apperçu des mes réalisations personnelles. Je ne peux mettre que des images car certaines ne sont pas des projets WEB mais desktop.
        Et d'autres sont des projets dont je n'ai pas le droit de partager le code source.
    </p>
    <p class="text-sm mt-2">
        Astuce : Double cliquez une image pour l'agrandir.
    </p>

    <article class="container">
        <h4 class="text-2xl py-4 font-bold">Projet 1 : Teamtool</h4>
        <p class="text-xl mb-5">
            Description : ce projet est un client desktop développé avec Python et le framework graphique PYQT.<br>
            Son principal object est l'optimisation de Kit emailing et le routage. <br>
            En effet, il est connecté à une solution de routage et permet d'utiliser tout le potentiel du router sans avoir à ouvrir l'appli WEB à chaque fois.
        </p>
        <Carousel
            :images="projects.teamtool"
        ></Carousel>        
    </article>

    <article class="container mt-5 sm:mt-10">
        <h4 class="text-2xl py-4 font-bold">Projet 2 : Newsletter builder</h4>
        <p class="text-xl">
            Description : ce projet est une boîte à outil permettant la création d'une newsletter email rapidement.<br>
            Il a été développé avec le framework PHP Laravel et le framework javascript VueJS 3.
            Basé sur un système de template, il est possible de modifier le design original afin d'avoir des variations en un temps record. <br>
            Une gallerie d'image est disponible ainsi qu'un éditeur d'image. Une fonction de rognage avancé est également à disposition.
        </p>
        <Carousel
            :images="projects.kitbuilder"
        ></Carousel>        
    </article> 
    
    <article class="container mt-5 sm:mt-10">
        <h4 class="text-2xl py-4 font-bold">Projet 3 : Image optimizer</h4>
        <p class="text-xl">
            Description : ce projet est un petit mais très utile outil à utiliser au quotidien.<br>
            En effet, il permet de redimentionner en lot des images, et les exporter au format souhaité.<br>
            Les technologies utilisées sont Python et PYQT.
        </p>
        <Carousel
            :images="projects.imageOptimizer"
        ></Carousel>        
    </article> 
</section>
</template>

<script setup>
import Carousel from '../components/Carousel.vue';

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