import { onMounted, onUnmounted, ref } from "vue";
import { debounce } from "lodash";

export function useScrollToTop(offsetStart = 0) {
    const isTopest = ref(true);

    function handleScroll() {
        isTopest.value = true;
        if (window.scrollY > offsetStart) {
            isTopest.value = false;
        }
    }

    function scrollToElem(elemID, behavior='smooth', block='start', inline='center') {
        var elem = document.getElementById(elemID);
        console.log(elem);
        // block values: "start" | "center" | "end" | "nearest"
        // behavior values: "auto"  | "instant" | "smooth"
        // inline values: "start" | "center" | "end" | "nearest"
        elem.scrollIntoView({
            behavior: behavior,
            block: block,
            inline: inline
        });
    }

    onMounted(() => {
        window.addEventListener('scroll', debounce(handleScroll, 250));
    });
    onUnmounted(() => {
        window.removeEventListener('scroll', handleScroll);
    });

    return { isTopest, scrollToElem }
}
