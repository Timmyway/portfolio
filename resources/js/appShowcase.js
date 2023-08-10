import { createApp,  } from 'vue/dist/vue.esm-bundler.js';
import axios from 'axios';
import { createPinia } from 'pinia';

const pinia = createPinia()

// Work with Vue3
const app = createApp({
    components: {
        
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