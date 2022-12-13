<template>
<section class="carousel">
    <div class="carousel__board">
        <button class="carousel-btn" @click="previous">
            <i class="fa fa-chevron-left"></i>
        </button>
        <div class="carousel__board__image">
            <h6 class="carousel__board__title">{{ pointer + 1 }} - {{ currentImage?.title }}</h6>
            <img 
                :class="[currentImage?.id === currentImageToPreview?.id ? 'preview' : 'no-preview' ]"
                :src="`${siteURL}${currentImage?.src}`" alt=""
                @dblclick="previewImage(currentImage)"
            >
        </div>
        <button class="carousel-btn" @click="next">
            <i class="fa fa-chevron-right"></i>
        </button>        
    </div>
</section>
</template>

<script setup>
import { computed, inject, ref } from "@vue/runtime-core"

const siteURL = inject('$siteURL');

const props = defineProps({
    title: String,
    images: Array
});

const pointer = ref(0);
const currentImageToPreview = ref({ id: null });

const currentImage = computed(() => {
    try {
        return props.images[pointer.value]
    } catch (err) {
        return 0;
    }
});

function previous() {
    if (pointer.value > 0) {        
        pointer.value -= 1;
    } else {
        pointer.value = props.images.length - 1;
    }
}

function next() {
    if (pointer.value < props.images.length - 1) {
        pointer.value += 1;
    } else {
        pointer.value = 0;
    }
}

function previewImage(image) {
    if (currentImageToPreview.value.id !== null) {
        currentImageToPreview.value.id = null;    
    } else {
        currentImageToPreview.value.id = image.id;
    }    
}
</script>

<style scoped>
.carousel {
    
}
.carousel__board {    
    display: flex;
    align-items: center;
    max-width: 1100px;
    margin: 0 auto;
}
.carousel__board__title {    
    font-weight: bold;
    font-size: 1rem;
    padding: 5px 0;
}
.carousel__board__image {
    padding: 15px;
    box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
}
.carousel__board__image img {
    width: 100%;
    transition: all .4s;    
}
.carousel-btn {
    font-size: 1.5rem;
    width: auto; height: 64px;
    background: rgba(230, 230, 230, .5);
    padding: 3px 6px;
}
.preview {
    /* position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    max-width: 80%;
    z-index: 100; */
    transform: scale(1.5);
    cursor: zoom-out;
}
.no-preview { cursor: zoom-in; }
@media screen and (min-width: 768px) {
    .carousel-btn {
        font-size: 3rem;
        width: auto; height: 96px;
        background: rgba(230, 230, 230, .5);
        padding: 3px 12px;
    }
    .carousel__board__title {                
        font-size: 1.5rem;
        padding: 10px 0;
    }
    
}
</style>