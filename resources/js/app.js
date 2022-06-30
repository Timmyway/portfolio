import { createApp } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
// import useVuelidate from '@vuelidate/core'
// import { required } from '@vuelidate/validators'
import Home from './pages/Home.vue';
import Contact from './pages/Contact';
import About from './pages/About';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/contact', component: Contact }
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

// Work with Vue3
const app = createApp({    
    data() {
        return {
            msg: 'tim'
        }
    },
    created() {
        console.log(this.campaignsData)
    },
    computed: {        
        
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
})

function capitalize(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

app.provide('templateDatas', window.templateDatas);
app.provide('$axios', axios);
app.provide('$capitalize', capitalize);
app.provide('$siteURL', 'http://127.0.0.1:8000/');

app.use(router);

app.mount('#app');