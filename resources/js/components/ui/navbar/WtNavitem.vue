<script setup>
import { inject } from 'vue';
import { useRoute } from 'vue-router';

const props = defineProps({
    iconClass: { type: String, default: '' },
    text: { type: String, default: '' },
    link: { type: String, default: '' },
    target: { type: String, default: '_self' },
    download: { type: Boolean, default: false }
});

const baseUrl = inject(['$baseUrl']);

const isActiveRoute = (routes) => {
    const route = useRoute();

    if (typeof routes === 'string') {
        return route.path === routes
    } else if (Array.isArray(routes)) {
        return routes.includes(route.path)
    }
}
</script>

<template>
<li
    class="navbar__items__item"
    :class="{ 'nav-item--active': isActiveRoute(link) }"
    aria-current="page"
>
    <template v-if="download">
        <a
            class="nav-link"
            :href="`${baseUrl}${link}`"
            :target="target"
            :download="download"
        >
            <i :class="iconClass"></i>
            <span>{{ text }}</span>
        </a>
    </template>
    <template v-else>
        <a
            class="nav-link"
            :href="`${baseUrl}${link}`"
            :target="target"
        >
            <i :class="iconClass"></i>
            <span>{{ text }}</span>
        </a>
    </template>
</li>
</template>
