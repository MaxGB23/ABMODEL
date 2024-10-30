import "./bootstrap";
import { createApp } from "vue";
import router from "./router";
import app from "./components/App.vue";

createApp(app).use(router).mount("#app");
// const app = createApp({});
// app.component("Home", Home);
// app.mount("#app");


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
