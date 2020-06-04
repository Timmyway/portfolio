
<template>
  <div>
    <banner 
      heading="Bienvenue sur mon portfolio"
      subheading="C'est mon terrain de jeu, il est récent mais je compte le mettre à jour au fur et à mesure de mes expériences"
      color="secondary text--light"
      :height="'two-third'"
    >
        <template v-slot:content>
          <div class="colors">
            <note-manager></note-manager>
          </div>
          
        </template>
    </banner>
    <banner 
        heading="Bienvenue sur mon portfolio"
        subheading="C'est mon terrain de jeu, il est récent mais je compte le mettre à jour au fur et à mesure de mes expériences"
        color="indigo text--light"
        :height="'one-third'"
    ></banner>    
  </div>
</template>

<script>
import Banner from './reusables/Banner.vue';
import NoteManager from './NoteManager.vue';

export default {
  data() {
    return {      
      selectedColor: '77, 36, 61'
    }
  },  
  components: {
    Banner,
    NoteManager
  }
}
</script>

<style lang="scss">
@import './styles/main';

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

  .card {
    max-width: 50%;
    margin: 0 auto;
    padding: 1rem;
  }
}
</style>