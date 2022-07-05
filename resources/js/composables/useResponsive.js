import { onMounted, onUnmounted, ref, computed } from "vue";

export default function useResponsive() {
    let screenWidth = ref(window.innerWidth);

    function onResize() {
        screenWidth.value = window.innerWidth;
    }
    onMounted(() => {
        window.addEventListener('resize', onResize);
    })
    onUnmounted(() => {
        window.removeEventListener('resize', onResize);
    })
    
    let isMobile = computed(() => {
        return screenWidth.value <= 720 ? true : false;
    })

    return { screenWidth, isMobile }
}