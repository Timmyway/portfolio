<script setup>
import { reactive, computed } from 'vue';
import useResponsive from '../../../composables/useResponsive';
import WtNavitem from './WtNavitem.vue';
import { debounce } from 'lodash';

const props = defineProps({
    items: Array
});

let view = reactive({mobileMenu: false});

let { isMobile } = useResponsive();

const isOpen = computed(() => {
    return isMobile.value && view.mobileMenu;
});

const handleWindowScoll = (upCallback, downCallback, delay = 200) => {
    let prevScrollpos = window.scrollY;
    const debouncedUpCallback = debounce(upCallback, delay);
    const debouncedDownCallback = debounce(downCallback, delay);
    window.onscroll = () => {
        const currentScrollPos = window.scrollY;
        if (prevScrollpos > currentScrollPos) {
            // Scroll top
            debouncedUpCallback();
        } else {
            // Scroll down
            debouncedDownCallback();
        }
        prevScrollpos = currentScrollPos;
    }
};

const handleScrollUp = () => {
    console.log('up');
}

const handleScrollDown = () => {
    console.log('down');
}

</script>

<template>
<nav
    class="w-full"
    :class="[isMobile ? 'wt-nav--mobile' : 'wt-nav']"
>
    <div
        class="wt-nav__container"
        :class="[(isOpen) ? 'h-full': '' ]"
    >
        <transition
            enter-active-class="animate__animated animate__slideInRight"
            leave-active-class="animate__animated animate__slideOutRight"
        >
            <ul
                v-if="(isOpen) || !isMobile"
                class="wt-nav__items"
            >
                <template v-for="navItem in items" :key="navItem.id">
                    <wt-navitem
                        :text="navItem?.text"
                        :link="navItem?.link?.route"
                        :download="navItem?.link?.download ?? false"
                        :icon-class="navItem?.icon"
                    ></wt-navitem>
                </template>
            </ul>
        </transition>

        <div class="wt-nav--mobile__menu" v-if="isMobile">
            <button class="wt-nav--mobile__menu__btn-close">
                <i
                    class="fas" :class="[view.mobileMenu ? 'fa-times' : 'fa-bars']"
                    v-on:click="view.mobileMenu = !view.mobileMenu"
                ></i>
            </button>
        </div>
    </div>
</nav>
</template>

<style scoped lang="scss">
.wt-nav {
	font-size: 1.2rem;
	padding-top: 0.5rem;
	padding-bottom: 0.5rem;
	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	transition: top 0.3s;
	z-index: 99;
    background-color: #ffffff;
    .wt-nav__container {
		display: flex;
        align-items: center;
		justify-content: space-between;
		padding: .3rem .5rem;
	}
    .logo {
		font-size: 2rem;
		margin: 0.5rem 1rem;
	}
    .wt-nav__items {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 5px;
    }
}

.wt-nav--mobile {
	font-size: 1.2rem;
	box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	position: relative;
	.wt-nav__container {
		display: flex; align-items: center;
		justify-content: flex-end;
		padding: .7rem .3rem;
		position: relative;
		min-height: 40px;
	}
    &__menu {
		position: absolute;
		right: 5px; top: 2px; z-index: 99;
        &__btn-close {
            color: white;
            font-size: 1.2rem;
            background-color: hsl(9, 77%, 20%);
            width: 32px; height: 32px;
            border-radius: 100%;
            display: flex; justify-content: center; align-items: center;
            padding: 15px;
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px 0px;
            &:hover {
                background-color: hsl(9, 77%, 40%);
            }
        }
	}
    .wt-nav__items {
		display: flex;
		align-items: center;
		flex-direction: column;
        gap:15px;
		background-color: #ffffff;
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
		position: absolute; z-index: 99;
		top: 0px; left: 0;
		width: 100%;
		padding: .7rem;
    }
}


</style>
