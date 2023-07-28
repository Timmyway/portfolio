<template>
<div
    :class="['wt-card-container', bgClass]"
>
    <h4 class="text-2xl wt-card-container__title text-3xl font-bold pb-2">{{ title }}</h4>
    <div class="wt-card-container__cards" :style="{justifyContent: hAlign}">
        <template v-for="card in cards" :key="`${identifier}-${card.id}`">
        <Card 
            :width="cardWidth"
            :src="$siteURL + card.src"
            :label="card.label"
            image-width="96px"
        ></Card>        
        </template>
    </div>
</div>
</template>

<script>
import Card from '../components/Card.vue';

export default {
    inject: ['$siteURL'],
    props: {
        cards: {
            type: Object
        },
        identifier: {
            type: String
        },
        cardWidth: {
            type: String
        },
        hAlign: { type: String, default: 'center' },
        title: { type: String, default: '' },
        bgcolor: { type: String, default: '#25354A' },
        bgClass: { type: String, default: 'bg-primary' }
    },
    components: {
        Card
    }
}
</script>

<style lang="scss">
.wt-card-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 1100px;
    padding: 1rem;
    &__title {
        color: white;
    }
    &__cards {
        display: flex; flex-wrap: wrap;
        max-width: 1100px;
        padding: 1rem;
        gap: 25px;
    }
    &:first-child {
        border-radius: 6px 6px 0 0;
    }
    &:last-child {
        border-radius: 0 0 6px 6px;
    }
}
</style>