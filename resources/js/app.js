import { computed, createApp, reactive } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
import { createPinia } from 'pinia'
import Home from './pages/Home.vue';
import Projects from './pages/Projects.vue';
import Contact from './pages/Contact.vue';
import About from './pages/About.vue';
import TimerPage from './pages/TimerPage.vue';
import { createRouter, createWebHistory } from 'vue-router';
import Vue3TouchEvents from "vue3-touch-events";
import 'animate.css';
import { ref } from 'vue';
import WtNavbar from './components/ui/navbar/WtNavbar.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/a-propos', component: About },
    { path: '/contact', component: Contact },
    { path: '/projets', component: Projects }
];

const pinia = createPinia()

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
});

// Work with Vue3
const app = createApp({
    components: {
        WtNavbar
    },
    setup() {
        const navItems = ref([
            { id: 1, text: 'Acceuil', icon: 'fas fa-home', link: { route: '/' } },
            { id: 2, text: 'A propos', icon: 'fas fa-home', link: { route: '/a-propos' } },
            { id: 3, text: 'Réalisations', icon: 'fas fa-home', link: { route: '/projets' } },
            { id: 4, text: 'Contact', icon: 'fas fa-home', link: { route: '/contact' } },
            { id: 5, text: 'Mon CV', icon: 'fas fa-home', link: { route: '/docs/cv-tim.pdf', download: true } },
        ])

        return { navItems }
    },
    methods: {
        isActiveRoute(routes) {
            if (typeof routes === 'string') {
                if (this.$route.path === routes) {
                    return true;
                }
            } else if (Array.isArray(routes)) {
                if (routes.includes(this.$route.path)) {
                    return true;
                }
            }
            return false;
        }
    }
});

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

app.use(router);
app.use(pinia);
app.use(Vue3TouchEvents);

app.provide('templateDatas', window.templateDatas);
app.provide('$axios', axios);
app.provide('$baseUrl', window.baseUrl);
app.provide('$capitalize', capitalize);
if (import.meta.env.VITE_APP_ENV === 'prod') {
    app.provide('$siteURL', import.meta.env.VITE_APP_PROD_URL);
} else {
    app.provide('$siteURL', import.meta.env.VITE_APP_URL);
}
app.provide('$googleCaptchaClientKey', import.meta.env.VITE_GOOGLE_CAPTCHA_CLIENT_KEY);

app.mount('#app');
