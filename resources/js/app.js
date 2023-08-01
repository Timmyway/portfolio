import { computed, createApp, reactive } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
import { createPinia } from 'pinia'
import Home from './pages/Home.vue';
import Projects from './pages/Projects.vue';
import Contact from './pages/Contact.vue';
import About from './pages/About.vue';
import TimerPage from './pages/TimerPage.vue';
import { createRouter, createWebHistory } from 'vue-router';
import useResponsive from './composables/useResponsive';

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
})

// Work with Vue3
const app = createApp({ 
    setup() {
        let { screenWidth, isMobile } = useResponsive(); 
        
        let view = reactive({mobileMenu: false});        

        return { screenWidth, isMobile, view }
    },
    methods: {
        isActiveRoute(routes) {
            if (typeof routes === 'string') {
                if (this.$route.path === routes) {
                    return 'nav-item--active';
                }
            } else if (Array.isArray(routes)) {
                if (routes.includes(this.$route.path)) {
                    return 'nav-item--active';
                }                
            }
            return '';
        }
    }
});

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

app.use(router);
app.use(pinia);

app.provide('templateDatas', window.templateDatas);
app.provide('$axios', axios);
app.provide('$capitalize', capitalize);
if (import.meta.env.VITE_APP_ENV === 'prod') {
    app.provide('$siteURL', import.meta.env.VITE_APP_PROD_URL);
} else {
    app.provide('$siteURL', import.meta.env.VITE_APP_URL);
}
app.provide('$googleCaptchaClientKey', import.meta.env.VITE_GOOGLE_CAPTCHA_CLIENT_KEY);

app.mount('#app');