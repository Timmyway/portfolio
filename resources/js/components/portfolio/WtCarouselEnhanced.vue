<script setup>
import { computed, inject, ref } from "vue"

const siteURL = inject('$siteURL');

const props = defineProps({
    title: String,
    images: Array
});

const pointer = ref(0);
const currentImageToPreview = ref({id: null});

// Preview mode
const isPreviewing = ref(false);

function preview() {
    isPreviewing.value = true;
    document.body.classList.add('overlay-active');
}
function closePreview() {
    currentImageToPreview.value.id = null;
    isPreviewing.value = false;
    document.body.classList.remove('overlay-active');
}

const currentImage = computed(() => {
    try {
        return props.images[pointer.value]
    } catch (err) {
        return 0;
    }
});

function previousImage() {
    if (pointer.value > 0) {
        pointer.value -= 1;
    } else {
        pointer.value = props.images.length - 1;
    }
}

function nextImage() {
    if (pointer.value < props.images.length - 1) {
        pointer.value += 1;
    } else {
        pointer.value = 0;
    }
}

function selectImage(image) {
    const index = props.images.findIndex((img) => img.id === image.id);

    if (index !== -1) {
        pointer.value = index;
    } else {
        console.error('Image not found.');
    }
}

function togglePreviewImage(image) {
    if (currentImageToPreview.value.id !== null) {
        closePreview();
    } else {
        preview(image)
    }
}

function onSwipeLeft(event) {
    previousImage();
}
function onSwipeRight(event) {
    nextImage();
}
function onTap() {
    alert('Tapping')
}
function onSwipe(direction) {
    console.log(direction);
    switch (direction) {
        case 'left':
            nextImage();
            break;
        case 'right':
            previousImage();
            break;
    }
}

const preloadImages = () => {
    props.images.forEach(image => {
        const img = new Image();
        img.src = image.src;
        console.log(`Image ${img.src} has been preloaded !`)
    });
}

preloadImages();
</script>

<template>
    <section class="carousel" :class="['overflow-hidden' ? isPreviewing : '']">
        <!-- Overlay -->
        <div class="carousel-overlay"
            :class="{ active: isPreviewing }"
            @click.prevent="closePreview"
        ></div>
        <div class="carousel__board">
            <div class="carousel__board__viewer">
                <button class="carousel-control" @click="previousImage">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <div>
                    <div>
                        <div v-touch:swipe="onSwipe">
                            <h6 class="carousel__board__title">
                                <i class="fas fa-expand" @click.prevent="preview()"></i>
                                {{ currentImage?.title }}
                            </h6>
                            <div class="carousel__board__viewer__image-wrapper">
                                <div
                                    :class="[isPreviewing ? 'preview' : 'no-preview' ]"
                                    class="flex items-center gap-2"
                                >
                                    <button v-if="isPreviewing" class="carousel-control mx-2" @click.prevent="previousImage">
                                        <i class="fa fa-chevron-left"></i>
                                    </button>
                                    <img
                                        class="carousel__board__viewer__image"
                                        :src="`${siteURL ?? ''}${currentImage?.src}`" alt=""
                                        @click.prevent="preview()"
                                    >
                                    <button v-if="isPreviewing" class="carousel-control mx-2" @click.prevent="nextImage">
                                        <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control" @click.prevent="nextImage">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
            <div class="carousel__board__thumbnails">
                <template
                    v-for="thumbnail in images"
                    :key="`wt-carousel-thumbnail${thumbnail.id}`"
                >
                    <img
                        class="carousel__board__thumbnails__thumbnail"
                        :class="{ 'thumbnail--active': thumbnail.id === currentImage.id}"
                        :src="`${siteURL ?? ''}${thumbnail?.src}`" alt=""
                        @click.prevent="selectImage(thumbnail)"
                    >
                </template>
            </div>
        </div>
    </section>
</template>

<style scoped lang="scss">
.carousel {
    box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 1px, rgba(0, 0, 0, 0.09) 0px 4px 2px, rgba(0, 0, 0, 0.09) 0px 8px 4px, rgba(0, 0, 0, 0.09) 0px 16px 8px, rgba(0, 0, 0, 0.09) 0px 32px 16px;
    padding: 5px;
}

.carousel__board {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 1100px;
    margin: 0 auto;
    &__viewer {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        overflow: hidden;
        &__image-wrapper {
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 240px;
        }
        &__image {
            box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;
            width: 100%;
            object-fit: contain;
            display: block;
        }
    }
    &__title {
        font-weight: bold;
        font-size: 1rem;
        padding: 5px 0;
        margin: 5px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    &__images {
        display: flex;
    }
    &__thumbnails {
        margin-top: 15px;
        display: flex;
        gap: 15px;
        padding: 3px;
        overflow-x: auto;
        width: 100%;
        max-width: 640px;
        /* Style custom scrollbar */
        &::-webkit-scrollbar {
            width: 5px;
            height: 8px;
        }
        &::-webkit-scrollbar-thumb {
            background-color: #1F0C6E; /* Set the color of the scrollbar thumb */
            border-radius: 4px; /* Set the border radius of the thumb */
        }
        &::-webkit-scrollbar-thumb:hover {
            background-color: lighten(#1F0C6E, 15%); /* Set the color of the scrollbar thumb on hover */
        }
        /* For Firefox */
        scrollbar-width: thin;
        /* End styling custom scrollbar */
        &__thumbnail {
            width: 64px;
            cursor: pointer;
            transition: all .2s;
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            box-sizing: border-box;
        }
    }
    &__image-wrapper {
        position: absolute;
        top: 0; left: 0;
    }
    &__image {
        padding: 15px;
        box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        img {
            width: 100%;
            transition: all .4s;
        }
    }
}

.thumbnail--active {
    border: 6px solid #68c5a2;
    border-radius: 4px;
    box-sizing: border-box;
    animation: shining 0.5s ease-in-out;
}

.carousel-control {
    font-size: 2rem;
    width: 20px; height: 24px;
    padding: 12px;
    display: flex; justify-content: center; align-items: center;
    border-radius: 50%;
    transition: all .2s;
    &:hover i {
        transition: transform .2s ease-in;
        transform: scale(1.2);
        &:active {
            color: #555;
            transform: scale(1.4);
        }
    }
}
.preview {
    background-color: white;
    position: fixed;
    top: 25%; left: 50%;
    transform: translate(-50%, -25%);
    width: 100%;
    max-width: 100%;
    z-index: 1000;
    animation: fade .4s cubic-bezier(.15,1.16,.38,-0.41);
    box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}
.carousel-overlay {
    position: fixed; /* Ensures the overlay covers the entire viewport */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.9); /* Use rgba to set the background color with transparency */
    z-index: 999; /* Adjust the z-index value to ensure the overlay appears above other elements */
    display: none; /* Start with the overlay hidden */
    cursor: zoom-out;
}
.carousel-overlay.active {
    display: block;
}
.no-preview { cursor: zoom-in; }

@media screen and (min-width: 768px) {
    .preview {
        max-width: 75%;
    }
    .carousel__board__title {
        font-size: 1.5rem;
        padding: 10px 0;
    }
    .carousel {
        &__board__viewer {
            &__image-wrapper {
                height: 480px;
            }
            &__image {
                width: 100%;
                object-fit: contain;
            }
        }
    }

}

/* Carousel animation */
.carousel-enter-active, .carousel-leave-active {
    transition: opacity 0.5s;
}
.carousel-enter-from, .carousel-leave-to {
    opacity: 0;
}

/* ensure leaving items are taken out of layout flow so that moving
    animations can be calculated correctly. */
.carousel-leave-active {
    position: absolute;
    width: 100%;
    transition: opacity 0.5s ease;
}

@keyframes shining {
    0% {
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0);
    }
    50% {
        box-shadow: 0 0 20px 20px rgba(255, 255, 255, 0.7);
    }
    100% {
        box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0);
    }
}

@keyframes fade {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>
