<script setup>
import { ref, computed } from 'vue';

const props = defineProps({
    stat: Number,
    speed: { type: Number, default: 100 }
});

const toDisplay = ref(0);
const intervalId = ref();

const animateStat = () => {
    console.log('Start interval');
    intervalId.value = setInterval(() => {
        if (toDisplay.value+1 >= props.stat) {
            console.log('Clear interval now...');
            clearInterval(intervalId.value);
        }
        console.log('Increment stat...', toDisplay.value);
        toDisplay.value ++;
    }, props.speed);
}

animateStat();

const opacity = computed(() => {
    return toDisplay.value / props.stat;
})
</script>

<template>
    <h6 v-bind="$attrs" :style="{ opacity: opacity }">
        {{ toDisplay }}
    </h6>
</template>

<style scoped>
h6 {
  transition: opacity 0.5s, transform 0.5s;
}
</style>
