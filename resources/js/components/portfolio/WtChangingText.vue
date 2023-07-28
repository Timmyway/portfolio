<template>
<div class="text-container">
    <span class="changing-text" v-bind:="$attrs">{{ currentText }}</span>
</div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue';

const props = defineProps({
    texts: Array,
    delay: { type: Number, default: 2000 }
});

const currentIndex = ref(0);
const intervalId = ref(null);

// Function to change the text
const changeText = () => {
    currentIndex.value = (currentIndex.value + 1) % props.texts.length;
};

// Start the text change on component mount
onMounted(() => {
    intervalId.value = setInterval(changeText, props.delay);
});

// Stop the interval on component unmount to avoid memory leaks
onUnmounted(() => {
    clearInterval(intervalId.value);
});

// Computed property to get the current text from the array
const currentText = computed(() => props.texts[currentIndex.value]);
</script>

<style>
.changing-text {
    animation: changeText 2s infinite;
}

@keyframes changeText {
    0% { opacity: 0; }    
    25% { opacity: 0.25; }
    50% { opacity: 0.55; }
    75% { opacity: 0.75; }
    100% { opacity: 1; }
}
</style>
  