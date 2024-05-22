<script setup>
const props = defineProps({
    heading: { type: String, default: '' },
    subheading: { type: String, default: '' },
    headingColor: { type: String, default: 'text-yellow-300' },
    bgGradient: {
        type: Object,
        default: () => {
            return { from: 'gray-800', via: 'gray-600', to: 'gray-800' };
        }
    },
    overlayClass: { type: String, default: 'bg-gray-700/80' },
    textColorClass: { type: String, default: 'text-white' },
    textAlign: { type: String, default: 'center' },
    bgImage: { type: String, default: '' },
    bgImageClass: { type: String, default: 'bg-cover bg-no-repeat bg-center' },
    blur: { type: String, default: 'lg' }
})
</script>

<template>
<div class="relative flex justify-center items-center bg-gradient-to-r"
    :class="[bgImage ? '' : `from-${bgGradient.from} via-${bgGradient.via} to-${bgGradient.to}`, bgImageClass]"
    :style="bgImage ? { backgroundImage: `url('${bgImage}')` } : {}"
>
    <div
        class="shadow-lg w-full px-4 py-8"
        :class="[overlayClass, `backdrop-blur-${blur}`]"
        v-bind="$attrs"
    >
        <h2
            v-if="heading"
            class="text-4xl px-4 py-4 text-center font-bold"
            :class="[headingColor]"
        >{{ heading }}</h2>
        <h3 v-if="subheading">{{ subheading }}</h3>
        <p class="text-lg px-2 py-4 max-w-2xl mx-auto leading-8"
            :class="[`text-${textAlign}`, textColorClass]"
        >
            <slot></slot>
        </p>
    </div>
</div>
</template>
