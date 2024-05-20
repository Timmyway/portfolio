<template>
<section class="media-content-block">
    <div class="media-content-block__image">
        <img class="mcb-image" :src="imageSrc" alt="">
    </div>
    <div class="media-content-block__block">
        <div class="media-content-block__block__wrapper">
            <h1 class="text-4xl py-4 lg:py-6 lg:text-6xl">{{ heading }}</h1>
            <h2 class="text-2xl py-2 lg:py-4 lg:text-4xl">{{ subheading }}</h2>
            <p class="text-base lg:text-lg">
                <slot name="paragraph"></slot>
            </p>
        </div>
    </div>
</section>
</template>

<script setup>
const props = defineProps({
    heading: { type: String, default: '' },
    subheading: { type: String, default: '' },
    paragraph: { type: String, default: '' },
    imageSrc: String
});
</script>

<style lang="scss">
.media-content-block {
    display: grid;
    grid-template-columns: 1fr;
    @media screen and (min-width: 768px) {
        grid-template-columns: 50% auto;
    }
    &__block {
        display: flex;
        align-items: center;
        justify-content: center;
        @media screen and (min-width: 768px) {
            position: relative;
            margin-left: -10%;
            justify-content: flex-start;
        }
        &__wrapper {
            box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
            max-width: 32rem;
            padding: 15px;
            border: 4px solid hsl(252, 80%, 84%);
            border-radius: 4px 0 60px 4px;
            background-color: white;
        }
    }
    .mcb-image {
        box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;
        background: linear-gradient(129deg, rgba(246,170,28,1) 51.9%, rgba(31,12,110,1) 52%);
        width: 100%;
    }
}
</style>
