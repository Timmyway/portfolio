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
            {"id": 5, "label": "Tailwind", "src": "images/icons/tailwind-icon.png"}
        ],
        tools: [
            {"id": 1, "label": "Sass", "src": "images/icons/sass-icon.png"},
            {"id": 2, "label": "Webpack", "src": "images/icons/webpack-icon.png"},
            {"id": 3, "label": "Adobe XD", "src": "images/icons/adobexd-icon.png"},
            {"id": 3, "label": "Wordpress", "src": "images/icons/wordpress-icon.png"},
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



