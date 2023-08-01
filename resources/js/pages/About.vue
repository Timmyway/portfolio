<template>
<div class="mx-auto">
    <section>
        <media-content-block
            heading="Je suis Tim"
            :image-src="`${$siteURL}images/tim.WebP`"
        >
            <template #paragraph>
                <p class="text-lg">
                    <span class="text-4xl font-bold">D</span>éveloppeur fullstack autodidacte et passionné du WEB.
                    <br>
                    J'ai commencé mon aventure en 2016, en apprennant le langage de programmation Python, et depuis je ne peux plus m'arrêter de coder.
                    <br><br>
                    J'adore créer des sites et applications afin de me perfectionner, mais aussi de résoudre des problématiques diverses.
                    <br><br>
                    Quand je ne suis pas en train de coder, j'essaye au maximum de profiter de mes proches. <br>
                    Dans mes temps libres, je joue au ⚽ et au 🏀."
                </p>
            </template>
        </media-content-block>
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
        </div>
    </section>
</div>
</template>

<script setup>
import { inject } from 'vue';
import Hero from '../components/Hero.vue';
import MediaContentBlock from '../components/portfolio/MediaContentBlock.vue';

const $siteURL = inject('$siteURL');
</script>

<style lang="scss">

</style>