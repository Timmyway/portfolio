import { createApp, reactive } from 'vue/dist/vue.esm-bundler';
import axios from 'axios';
import { createPinia } from 'pinia'
import useResponsive from './composables/useResponsive';

const pinia = createPinia()

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

app.use(pinia);
app.provide('$axios', axios);
if (import.meta.env.VITE_APP_ENV === 'prod') {
    app.provide('$siteURL', import.meta.env.VITE_APP_PROD_URL);
} else {
    app.provide('$siteURL', import.meta.env.VITE_APP_URL);
}

app.mount('#app');