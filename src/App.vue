<template>
  <div id="app">    
    <app-header color="primary"></app-header>
    <router-view></router-view>
  </div>
</template>

<script>
import Header from './components/Header.vue';

export default {
  name: 'App',
  data() {
    return {
      
    }
  },
  components: {
    appHeader: Header    
  }
}
</script>

<style lang="scss">
@import './components/styles/main';

:root {
  @each $className,$color in $colors {
    .#{$className} {
      background: $color
    }
    .text--#{$className} {
      color: $color
    }
  }

  @debug $theme-colors;
  @each $className,$color in $theme-colors {
    .#{$className} {
      background: $color;
    }
    .text--#{$className} {
      color: $color
    }
  }
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  padding: 0; margin: 0;
}
</style>
