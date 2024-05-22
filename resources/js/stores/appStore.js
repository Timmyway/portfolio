import { defineStore } from "pinia";
import { ref } from "vue";

export const useAppStore = defineStore('application', () => {
    const technologies = ref({
        languages: [
            {"id": 1, "label": "PHP", "src": "images/icons/php-icon.png"},
            {"id": 2, "label": "Python", "src": "images/icons/py-icon.png"},
            {"id": 3, "label": "Javascript", "src": "images/icons/js-icon.png"},

        ],
        frameworks: [
            {"id": 1, "label": "Laravel", "src": "images/icons/laravel-icon.png"},
            {"id": 3, "label": "Flask", "src": "images/icons/flask-icon.png"},
            {"id": 4, "label": "VueJS", "src": "images/icons/vue-icon.png"},
            {"id": 5, "label": "Tailwind", "src": "images/icons/tailwind-icon.png"},
            {"id": 6, "label": "Alpinejs", "src": "images/icons/alpine.js.png"},
            {"id": 7, "label": "Livewire", "src": "images/icons/livewire-icon.png"}
        ],
        tools: [
            {"id": 1, "label": "Sass", "src": "images/icons/sass-icon.png"},
            {"id": 2, "label": "Webpack", "src": "images/icons/webpack-icon.png"},
            {"id": 3, "label": "Vite", "src": "images/icons/vitejs-icon.png"},
            {"id": 4, "label": "Adobe XD", "src": "images/icons/adobexd-icon.png"},
            {"id": 5, "label": "Wordpress", "src": "images/icons/wordpress-icon.png"},
            {"id": 6, "label": "Nginx", "src": "images/icons/nginx-icon.png"},
        ],
        databases: [
            {"id": 1, "label": "SQL", "src": "images/icons/sql-icon.png"},
            {"id": 2, "label": "MongoDB", "src": "images/icons/mongodb-icon.png"},
        ]
    });

    function getTech() {
        return technologies.value;
    }

    return { getTech }
  })



