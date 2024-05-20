<template>
<div class="wt-card" :style="{width: width}">
    <div class="wt-card__head" v-if="src">
        <img :src="src" :alt="label" :style="{ width: imageWidth }" />
    </div>
    <div class="wt-card__body">
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

<style lang="scss">
.water {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 0;
    background: linear-gradient(#4cb8c4, #3b5998); /* Water color gradient */
    animation: fillWater 2s forwards;
}
@keyframes fillWater {
  from {
    height: 0;
  }
  to {
    height: 100%;
  }
}
.wt-card {
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    background-color: #F7F5FB;
    border-radius: 12px 0 12px 0;
    transition: transform .4s;
    filter: brightness(70%);
    &:hover {
        transform: scale(1.15) translateX(-3%) translateY(-5%);
        filter: brightness(100%);
        color: #1F0C6E;
        font-weight: bold;
        box-shadow: 0 0 10px 5px rgba(255, 255, 255, 0.5);
    }
    &-sm {
        max-width: 320px;
    }
    &__head {
        img {
            width: 100%; display: block; margin: 0 auto;
            padding: 5px;
        }
    }
    &__body {
        text-align: center;
        padding: 0.5rem 0.7rem;
        span {
            font-size: 1.6rem;
        }
        .text-bloc {
            max-height: 150px;
            overflow: auto;
        }
    }
}
</style>
