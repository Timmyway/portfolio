<template>
<div class="mx-auto">
    <section>
        <Hero 
            title="Bienvenue sur mon portefolio" 
            subtitle="Ici, je partage avec vous ma passion pour le WEB. Mais je vous montre également les technologies que j'utilise au quotidien." 
            :src="$siteURL + 'images/bg.jpg'"
            credit="Photo by Caio: https://www.pexels.com/photo/macbook-air-on-grey-wooden-table-67112/"
        ></Hero>        
        <div class="container p-6 mx-auto">
            <h4 class="text-4xl p-6 text-center font-bold">À propos de moi</h4>
            <p class="text-xl mb-10">
                Je suis Tim, développeur fullstack autodidacte et passionné du WEB.<br>
                J'ai commencé mon aventure en 2016, en apprennant le langage de programmation Python, et depuis je ne peux plus m'arrêter de coder.<br>
                J'adore créer des sites et applications afin de me perfectionner, mais aussi de résoudre des problématiques diverses.<br>
                Quand je ne suis pas en train de coder, j'essaye au maximum de profiter de mes proches. <br>
                Dans mes temps libres, je joue au ⚽ et au 🏀.
            </p>
            
            <article class="flex justify-center flex-wrap gap-4">
                <Cards 
                    :cards="languages" 
                    identifier="languages" 
                    title="Languages"
                    card-width="200px"
                    h-align="center"
                ></Cards>
                <Cards 
                    :cards="frameworks" 
                    identifier="frameworks" 
                    title="Frameworks"
                    card-width="200px"
                    h-align="center"
                ></Cards>
                <Cards 
                    :cards="tools" 
                    identifier="tools" 
                    title="Tools"
                    card-width="200px"
                    h-align="center"
                ></Cards>
                <Cards 
                    :cards="databases" 
                    identifier="databases" 
                    title="Databases"
                    card-width="200px"
                    h-align="center"
                ></Cards>
            </article>
            <div class="spacer"></div>
        </div>
    </section>
</div>
</template>

<script>
import Hero from '../components/Hero.vue';
import Cards from '../components/Cards.vue';
// import useVuelidate from '@vuelidate/core';
import MdTextfield from '../components/MdTextfield.vue';
import useValidation from '../composables/useValidation';

export default {
    inject: ['$siteURL'],
    components: {
        Hero,
        Cards,
        MdTextfield
    }, 
    setup() {        
        const { v$, form, validationData } = useValidation();
        return { v$, form, validationData };
    },
    data() {
        return {
            languages: [
                {"id": 1, "label": "PHP", "src": "images/icons/php-icon.png"},
                {"id": 2, "label": "Python", "src": "images/icons/py-icon.png"},
                {"id": 3, "label": "Javascript", "src": "images/icons/js-icon.png"},
                
            ],
            frameworks: [
                {"id": 1, "label": "Laravel", "src": "images/icons/laravel-icon.png"},                
                {"id": 3, "label": "Flask", "src": "images/icons/flask-icon.png"},
                {"id": 4, "label": "VueJS", "src": "images/icons/vue-icon.png"}
            ],
            tools: [
                {"id": 1, "label": "Sass", "src": "images/icons/sass-icon.png"},
                {"id": 2, "label": "Webpack", "src": "images/icons/webpack-icon.png"},
                {"id": 3, "label": "Adobe XD", "src": "images/icons/adobexd-icon.png"},
            ],
            databases: [
                {"id": 1, "label": "SQL", "src": "images/icons/sql-icon.png"},
                {"id": 2, "label": "MongoDB", "src": "images/icons/mongodb-icon.png"},
            ]
        }
    }    
}
</script>

<style>

</style>