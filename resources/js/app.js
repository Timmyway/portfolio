import { computed, createApp, reactive } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
// import useVuelidate from '@vuelidate/core'
// import { required } from '@vuelidate/validators'
import Home from './pages/Home.vue';
import ProjectPage from './pages/ProjectPage.vue';
import Contact from './pages/Contact';
import About from './pages/About';
import TimerPage from './pages/TimerPage';
import { createRouter, createWebHistory } from 'vue-router';
import useResponsive from './composables/useResponsive';

const routes = [
    { path: '/', component: ProjectPage },
    { path: '/about', component: About },
    { path: '/contact', component: Contact },
    { path: '/projects', component: ProjectPage },
    { path: '/timer', component: TimerPage }
]

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

app.provide('templateDatas', window.templateDatas);
app.provide('$axios', axios);
app.provide('$capitalize', capitalize);
if (process.env.MIX_APP_ENV === 'prod') {
    app.provide('$siteURL', process.env.MIX_APP_PROD_URL);
} else {
    app.provide('$siteURL', process.env.MIX_APP_URL);
}
app.provide('$googleCaptchaClientKey', process.env.MIX_GOOGLE_CAPTCHA_CLIENT_KEY);

app.mount('#app');