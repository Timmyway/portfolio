import { createApp, reactive, onMounted } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
import { createPinia } from 'pinia';
import WtMap from './components/localisation/WtMap.vue';

const pinia = createPinia()

// Work with Vue3
const app = createApp({
    components: {
        WtMap
    },
    setup() {
        const name = 'Tim';        
        
        return { name }
    },
    methods: {
        
    }
});

app.use(pinia);
app.provide('$axios', axios);
if (import.meta.env.VITE_APP_ENV === 'prod') {
    app.provide('$siteURL', import.meta.env.VITE_APP_PROD_URL);
} else {
    app.provide('$siteURL', import.meta.env.VITE_APP_URL);
}

app.mount('#app');