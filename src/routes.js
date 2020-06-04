import About from './components/About.vue';
import Home from './components/Home.vue';
import Cv from './components/Cv.vue';

export const routes = [
    {path: '', component: Home},
    {path: '/aboutme', component: About},
    {path: '/cv', component: Cv},
]