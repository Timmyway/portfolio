<template>
  <div :class="['banner', height != '' ? height + '--height' : '', typeof color === undefined || color != '' ? color : 'secondary']">
      <h3 class="heading" v-if="heading">{{ heading }}</h3>
      <h4 class="subheading" v-if="subheading">{{ subheading }}</h4>
      <slot name="content"></slot>
  </div>
</template>

<script>
export default {
    props: {
        heading: String,
        subheading: String,
        color: String,
        height: String
    }
}
</script>

<style lang="scss" scoped>
@import '../styles/variables';    

    @each $className,$ratio in $sizes {
        .#{$className}--height {
            height: 100vh * $ratio;
        }
        .#{className}--width {
            width: 100% / $ratio;
        }
    }

    .banner {
        padding: 1rem;
        .heading {
           font-size: 1.7rem;
        }
        .subheading {
            font-size: 1rem;
        }   
    }

    @media #{$breakpoint-medium} {
        .banner {
            .heading {
            font-size: 3rem;
            }
            .subheading {
                font-size: 1.8rem;
            }
        }
    }
</style>