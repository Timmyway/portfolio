<template>
<article class="portfolio-project">
    <h2 class="text-2xl flex items-center py-4 lg:py-6">{{ title }}</h2>
    <h6 class="text-xl underline py-2">Description :</h6>
    <p v-if="description" class="text-gray-600 leading-loose">
        {{ description }}
    </p>
    <p v-else>
        <slot name="description"></slot>
    </p>
    <div class="portfolio-project__project">
        <slot name="project"></slot>
    </div>
</article>
</template>

<script setup>
const props = defineProps({
    title: String,
    description: { type: String, default: '' }
})
</script>

<style lang="scss">
.portfolio-project {
    background-color: rgb(250, 250, 250);
    border-top: 4px solid hsl(231, 81%, 8%, .3);
    border-bottom: 4px solid hsl(231, 81%, 8%, .3);
    border-radius: 4px;
    padding: 10px 15px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
    @media screen and (min-width:  992px) {
        padding: 10px 40px;
    }
}
</style>
