<script setup>
import { reactive } from 'vue';
import useResponsive from '../../../composables/useResponsive';
import WtNavitem from './WtNavitem.vue';

const props = defineProps({
    items: Array
});

let view = reactive({mobileMenu: false});

let { screenWidth, isMobile } = useResponsive();
</script>

<template>
<nav class="w-full" :class="[isMobile ? 'navbar--mobile' : 'navbar']">
    <div class="navbar__container">
        <ul v-if="(isMobile && view.mobileMenu) || !isMobile" class="navbar__items">
            <template v-for="navItem in items" :key="navItem.id">
                {{ navItem?.link?.download }}
                <wt-navitem
                    :text="navItem?.text"
                    :link="navItem?.link?.route"
                    :download="navItem?.link?.download ?? false"
                    :icon-class="navItem?.icon"
                ></wt-navitem>
            </template>
        </ul>
        <transition name="fade">
            <div class="navbar__menu" v-if="isMobile">
                <i
                    class="fas fa-2x text-dark" :class="[view.mobileMenu ? 'fa-times text-danger' : 'fa-bars']"
                    v-on:click="view.mobileMenu = !view.mobileMenu"
                ></i>
            </div>
        </transition>
    </div>
</nav>
</template>
