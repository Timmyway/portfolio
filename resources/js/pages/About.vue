<template>
<div class="mx-auto">
    <section class="py-6 lg:py-12">
        <media-content-block
            heading="C'est Tim"
            :image-src="`${$siteURL}images/tim.WebP`"
        >
            <template #paragraph>
                <p class="text-lg text-justify leading-loose">
                    <span class="text-4xl font-bold">M</span>e voici, un développeur fullstack autodidacte et passionné du WEB.<br>
                    Initialement diplômé d'un Master en Management et gestion d'entreprise,
                    j'ai commencé mon aventure du Web en 2016 par l'apprentissage du langage de programmation Python.
                    Depuis je ne peux plus m'arrêter de coder.
                    <br><br>
                    <span class="text-4xl font-bold">E</span>n quête d'excellence, mon principal objectif est de créer des sites web et des applications Web modernes, sécurisés et de haute qualité.
                    Je trouve une satisfaction profonde à concevoir des solutions innovantes et à relever
                    les défis que le développement web peut offrir.
                    <br><br>
                    <span class="text-4xl font-bold">R</span>espectant énormément ma famille et mes proches, j'aime passer du temps avec eux
                    lorsque je ne suis pas plongé dans mes lignes de code.<br>
                    Dans mes temps libres, je fais aussi un peu de sport."
                    <br><br>
                    <span class="text-4xl font-bold">C</span>ontactez moi si vous souhaitez en savoir plus sur mon parcours, mes projets
                    ou si vous avez des opportunités de collaboration.
                    <br><br>
                    <span class="text-4xl font-bold">I</span>mpatient et toujours enthousiaste à l'idée de rencontrer de nouvelles personnes
                    et de relever de nouveaux défis.
                </p>
            </template>
        </media-content-block>
    </section>
</div>
</template>

<script setup>
import { inject } from 'vue';
import MediaContentBlock from '../components/portfolio/MediaContentBlock.vue';

const $siteURL = inject('$siteURL');
</script>

<style lang="scss">

</style>
