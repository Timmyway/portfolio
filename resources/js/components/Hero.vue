<template>
<section class="hero" :style="{backgroundImage: `url('${src}')`}">
    <div class="hero__heading text-theme">
        <h2 class="text-xl">{{ title }}</h2>
        <p class="text-md">
            {{ subtitle }}
        </p>
    </div>
</section>
</template>

<script>
export default {
    props: ['title', 'subtitle', 'src'],
    name: 'Hero'
}
</script>

<style lang="scss" scoped>
.hero {
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    height: 360px;
    transition: filter .4s;
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
</style>