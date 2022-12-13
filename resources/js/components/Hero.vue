<template>
<section class="hero" 
    :style="{ backgroundImage: `url('${src}')`, height: `${height}px` }"
>    
    <div class="hero__heading text-theme">
        <h2 class="text-6xl">{{ title }}</h2>
        <p class="text-xl pt-4 w-3/5">
            {{ subtitle }}
        </p>
        <span v-if="credit" class="hero-credit">{{ credit }}</span>
    </div>
</section>
</template>

<script setup>
const props = defineProps({
    title: String,
    subtitle: String,
    src: String,
    height: { type: Number, default: 480 },
    credit: { type: String, default: '' },
});

</script>

<style lang="scss" scoped>
.hero {
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;    
    transition: filter .4s;
    position: relative;
    &__heading {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 1rem;
        // -webkit-backdrop-filter: brightness(30%);
        backdrop-filter: brightness(30%);
        height: 100%;
    }
    p {        
        max-width: 960px;
    }
    @media only screen and (min-width: 600px)  {
        height: 480px;
    }
}
.hero-credit {
    position: absolute;
    top: 0; left: 0;
    color: white;
    font-size: .7rem;
    padding: 5px;
    font-family: Arial, Helvetica, sans-serif;
}
</style>