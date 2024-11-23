import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import router from "./router";
import app from "./Components/App.vue";



createApp(app).use(router).mount("#app");

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});






// Función para aplicar animación de "fade-in" a los elementos en el viewport
function applyScrollAnimations() {
    const elements = document.querySelectorAll(".fade-in");
    const viewportHeight = window.innerHeight;

    elements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;

        // Añadir o quitar la clase 'visible' en función de si el elemento está en el viewport
        if (elementTop < viewportHeight - 100) {
            element.classList.add("visible");
        } else {
            element.classList.remove("visible");
        }
    });
}

// Escuchar el evento de scroll para activar la animación
window.addEventListener("scroll", applyScrollAnimations);

// Ejecutar la animación también en el primer renderizado de la página
document.addEventListener("DOMContentLoaded", applyScrollAnimations);

