<template>
<div
    :class="['card-container', bgClass]"
>
    <h4 class="text-2xl card-container__title">{{ title }}</h4>
    <div class="card-container__cards" :style="{justifyContent: hAlign}">
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