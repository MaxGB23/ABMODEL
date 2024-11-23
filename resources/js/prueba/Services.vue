<template>
    <section id="services" class="services fade-in">
        <div class="services-content">
            <div class="service-grid">
                <div class="service-item" v-for="service in services" :key="service.title">
                    <!-- Imagen de herramienta -->
                    <img class="service-icon" :src="service.logo" alt="Icono de servicio" />
                    <h3>{{ service.title }}</h3>
                    <p class="">{{ service.description }}</p>
                    <div class="precio">
                        <p class="text-center pe">${{ service.precio }}</p>
                    </div>


                </div>
            </div>
            <div class="image-section">
                <img :src="logoUrl" alt="Servicios" />
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            services: [
                {
                    title: 'Redes de Comunicación',
                    description: 'Diseño e instalación de redes empresariales, asegurando conectividad segura y estable para el óptimo funcionamiento de su negocio.',
                    logo: `${window.location.origin}/images/1.png`,
                    precio: 6000,
                },
                {
                    title: 'Cámaras de Seguridad',
                    description: 'Sistemas de videovigilancia en alta definición, con monitoreo remoto para protección de hogares y negocios.',
                    logo: `${window.location.origin}/images/3.png`,
                    precio: 4000,
                },
                {
                    title: 'Alarmas de Seguridad',
                    description: 'Alarmas avanzadas con control de acceso biométrico, proporcionando máxima seguridad en el control de entradas y salidas.',
                    logo: `${window.location.origin}/images/4.png`,
                    precio: 8000,
                },
                {
                    title: 'Consultoría en Seguridad',
                    description: 'Asesoría especializada para crear soluciones de seguridad personalizadas, adaptadas a las necesidades específicas de cada cliente.',
                    logo: `${window.location.origin}/images/2.png`,
                    precio: 2500,
                }
            ],

            isVisible: false // Estado inicial para la visibilidad
        };
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/servicios.gif`;
        },
    },
    mounted() {
        // Usar Intersection Observer para animar la entrada
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("visible");
                    }
                });
            },
            { threshold: 0.2 }
        );
        const elements = document.querySelectorAll(".fade-in");
        elements.forEach((element) => observer.observe(element));
    }
};
</script>

<style scoped>
/* Estilo de la imagen como ícono */
.service-icon {
    width: 70px;
    /* Tamaño adecuado para el ícono */
    height: 70px;
    object-fit: cover;
    /* Asegura que la imagen mantenga su proporción */
    margin-bottom: 10px;
    /* Espaciado entre el ícono y el título */
    border-radius: 10px;
}

.precio {
    text-align: center !important;
    font-weight: bold !important;
    margin-top: 12px !important;
    /* background-color: #0e0e0e !important;  */
    padding: 10px 15px !important; /* Espaciado interno */
    border-radius: 8px !important; /* Bordes redondeados */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5) !important; /* Sombra más fuerte para resaltar en temas oscuros */
    border: 1px solid #111111 !important; /* Borde sutil para separación */
}

.pe {
    font-size: 1.6rem !important; /* Tamaño destacado */
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important; /* Fuente profesional */
    color: #ffffff !important; /* Azul claro, elegante y legible en temas oscuros */
    margin: 0 !important;
    line-height: 1.5 !important; /* Espaciado entre líneas */
    text-shadow: 1px 1px 1px rgba(0, 225, 255, 0.705) !important; /* Sombra ligera para mayor contraste */
}



/* Otros estilos */
.services {
    padding: 20px 20px;
    text-align: center;
}



.services-content {
    display: flex;
    flex-direction: column;
    max-width: 1200px;
    margin: 0 auto;
    gap: 30px;
    padding: 40px;
    border-radius: 15px;
}

.service-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
}

.service-item {
    padding: 20px;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.justify {
    text-align: justify;
}

.service-item:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 204, 255, 0.5);
}

.service-item h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #00ccff;
}

.service-item p {
    font-size: 0.9rem;
    color: #ccc;
}

.image-section {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 100%;
}

.image-section img {
    width: auto;
    max-width: 100%;
    height: auto;
    max-height: 300px;
    border-radius: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .service-grid {
        grid-template-columns: 1fr;
    }

    .services-content {
        flex-direction: column;
    }

    .image-section {
        margin-top: 20px;
    }
}

@media (min-width: 769px) {
    .services-content {
        flex-direction: row;
        justify-content: space-between;
    }

    .service-grid {
        flex: 2;
    }

    .image-section {
        flex: 1;
        max-width: 300px;
    }
}
</style>
