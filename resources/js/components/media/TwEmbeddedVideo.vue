<script setup>
import { computed } from 'vue';

const props = defineProps({
    width: {
        type: Number,
        default: 560
    },
    height: {
        type: Number,
        default: 315
    },
    src: {
      type: String,
      required: true,
    },
    autoplay: {
      type: Boolean,
      default: false,
    },
    accelerometer: {
      type: Boolean,
      default: false,
    },
    clipboardWrite: {
      type: Boolean,
      default: true,
    },
    encryptedMedia: {
      type: Boolean,
      default: true,
    },
    gyroscope: {
      type: Boolean,
      default: false,
    },
    pictureInPicture: {
      type: Boolean,
      default: true,
    },
    webShare: {
      type: Boolean,
      default: false,
    },
    fullscreen: {
        type: Boolean,
        default: true,
    },
    containerMaxWidth: {
        type: Number,
        default: 800,
    },
    aspectRatio: {
        type: String,
        default: '16:9',
    }
});

// Function to calculate padding-bottom based on aspect ratio string
const computedAspectRatio = computed(() => {
    const [width, height] = props.aspectRatio.split(':').map(Number);
    return (height / width) * 100;
});

const containerPaddingBottom = computed(() => {
    return (computedAspectRatio.value * props.containerMaxWidth) / 100;
});

const computedAllow = computed(() => {
    const allowList = [];

    if (props.accelerometer) allowList.push('accelerometer');
    if (props.autoplay) allowList.push('autoplay');
    if (props.clipboardWrite) allowList.push('clipboard-write');
    if (props.encryptedMedia) allowList.push('encrypted-media');
    if (props.gyroscope) allowList.push('gyroscope');
    if (props.pictureInPicture) allowList.push('picture-in-picture');
    if (props.webShare) allowList.push('web-share');

    return allowList.join('; ');
});
</script>

<template>
<div class="video-container" :style="{ maxWidth: containerMaxWidth + 'px', paddingBottom: containerPaddingBottom + 'px' }">
    <iframe
        :width="width"
        :height="height"
        :src="src"
        title="YouTube video player"
        frameborder="0"
        :allow="computedAllow"
        referrerpolicy="strict-origin-when-cross-origin"
        :allowfullscreen="fullscreen"
    ></iframe>
</div>
</template>

<style scoped>
.video-container {
    position: relative;
    width: 100%;
    height: 0;
    overflow: hidden;
    margin: 0 auto;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}
</style>
