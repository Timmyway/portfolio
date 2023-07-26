<template>
<div class="card ma-1" :style="{width: width}">
    <div class="card-head" v-if="src">
        <img :src="src" :alt="label" :style="{ width: imageWidth }" />
    </div>
    <div class="card-body">
        <span>{{ label }}</span>
    </div>
</div>
</template>

<script>
export default {
    props: {
        width: {
            type: String,
            default: '320px'
        },
        label: {
            type: String,
            default: 'Card'
        },
        src: {
            type: String
        },
        imageWidth: { type: String, default: '100%' }
    }
}
</script>

<style>

</style>