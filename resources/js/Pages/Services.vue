<template>
        <Head title="Servicios"/>

    <Nav></Nav>
    <section id="oc-services" class="oc-services oc-fade-in">

        <div class="oc-services-content">
            <div class="oc-service-grid">
                <div class="oc-service-item" v-for="service in services" :key="service.id">
                    <!-- Imagen de herramienta -->
                    <img class="oc-service-icon" :src="service.image_path" alt="Icono de servicio" />
                    <h3 class="text-2xl mb-4">{{ service.title }}</h3>
                    <p class="oc-service-description">{{ service.description }}</p>
                    <div class="oc-service-price">
                        <p class="oc-price-text">${{ service.precio }} </p>
                    </div>
                </div>
            </div>
            <div class="oc-image-section mx-auto">
                <img :src="logoUrl" alt="Servicios" />
            </div>
        </div>
    </section>
</template>

<script>
import Nav from '@/Components/NavInertia.vue';
import { Link, Head } from '@inertiajs/vue3';

export default {
    components: {
        Link,
        Nav,
        Head,
    },
    props: {
        services: {
            type: Array,
            required: true,
        },
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/servicios.gif`;
        },
    },
    mounted() {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("oc-visible");
                    }
                });
            },
            { threshold: 0.2 }
        );
        const elements = document.querySelectorAll(".oc-fade-in");
        elements.forEach((element) => observer.observe(element));
    },
};
</script>


<style scoped>
/* General Styles */
.oc-services {
    padding: 20px 20px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}

.oc-services-content {
    display: flex;
    flex-direction: column;
    max-width: 1200px;
    margin: 0 auto;
    gap: 30px;
    padding: 40px;
    border-radius: 15px;
}

.oc-service-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;

}

.oc-service-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    padding: 20px;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    width: 100%;  /* Reducido el ancho de los items */
    margin: 0 auto;  /* Centrado en el contenedor */
    height: 380px;  /* Altura fija para las tarjetas */
    overflow: hidden;  /* El contenido que sobrepase la altura se ocultará */
}

.oc-service-item h3 {
    color: #00ccff;
    font-weight: bold; /* Aplica negritas */
}

.oc-service-item:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 204, 255, 0.5);
}

.oc-service-icon {
    width: 75px;
    height: 75px;
    object-fit: cover;
    margin-bottom: 15px;
    border-radius: 10px;
}

.oc-service-description {
    font-size: 0.9rem;
    color: #ccc;
    flex-grow: 1;  /* Hace que la descripción ocupe el espacio disponible */
}

.oc-service-price {
    text-align: center;
    font-weight: bold;
    margin-top: 12px;
    padding: 10px 15px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
    border: 1px solid #111111;
}

.oc-price-text {
    font-size: 1.6rem;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: #ffffff;
    text-shadow: 1px 1px 1px rgba(0, 225, 255, 0.7);
}

.oc-image-section {
    display: flex;
    justify-content: center; /* Centrado horizontal */
 /* Centrado vertical */
    height: auto; /* Opcional: establece una altura */
    max-width: 100%;
    flex: 2;  /* Aumentar el tamaño de la sección de imagen */
}

.oc-image-section img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
}

/* Animations */
.oc-fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.oc-fade-in.oc-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 1085px) {
    .oc-service-grid {
        grid-template-columns: 1fr;
    }

    .oc-services-content {
        flex-direction: column;
    }

    .oc-image-section {
        margin-top: 20px;
    }
}

@media (min-width: 1086px) {
    .oc-services-content {
        flex-direction: row;
        justify-content: center;
    }

    .oc-service-grid {
        flex: 1;
    }

    .oc-image-section {
        flex: 2;  /* Aumentar el tamaño de la sección de imagen */
        max-width: 450px;  /* Ajustar el tamaño */
    }
}
</style>
