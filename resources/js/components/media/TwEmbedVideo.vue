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
    }
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
<div class="video-container">
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
    width: 100%;
    max-width: 800px;
    margin: 0 auto;
}
</style>
