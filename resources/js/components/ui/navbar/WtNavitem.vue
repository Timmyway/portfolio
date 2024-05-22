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
        return route.path === routes;
    } else if (Array.isArray(routes)) {
        return routes.includes(route.path);
    }
}

const withoutTrailingSlash = (url) => {
    if (url.endsWith('/')) {
        return url.slice(0, -1);
    }
    return url;
}
</script>

<template>
<li
    class="wt-nav-item text-xs px-4 py-2 rounded-tr-lg rounded-bl-lg"
    :class="{ 'wt-nav-item--active': isActiveRoute(link) }"
    aria-current="page"
>
    <template v-if="download">
        <a
            class="flex flex-col items-center gap-2"
            :href="`${withoutTrailingSlash(baseUrl)}${link}`"
            :target="target"
            :download="download"
        >
            <i class="wt-nav-item__icon" :class="iconClass"></i>
            <span class="wt-nav-item__text text-gray-700">{{ text }}</span>
        </a>
    </template>
    <template v-else>
        <router-link
            class="flex flex-col items-center gap-2"
            :to="`${withoutTrailingSlash(baseUrl)}${link}`"
            :target="target"
        >
            <i class="wt-nav-item__icon" :class="iconClass"></i>
            <span class="wt-nav-item__text text-gray-700">{{ text }}</span>
        </router-link>
    </template>
</li>
</template>

<style scoped lang="scss">
.wt-nav-item {
    &:hover {
        background-color: hsl(39, 92%, 94%);
    }
    &__icon {
        font-size: 1.2rem;
    }
    &__text {
        font-size: 1rem;
    }
}

.wt-nav-item--active {
    background-color: #F6AA1C;
    padding: 10px 15px;
    i {
        color: #441edb;
    }
    a {
        font-weight: bold;
        color: #441edb;
    }
    &:hover {
        background-color: hsl(39, 92%, 64%);
    }
}

.wt-nav--mobile {
    .wt-nav-item {
        &__icon {
            font-size: 1.5rem;
        }
    }
    .wt-nav-item--active {
        padding: 15px 10px;
    }
}

</style>
