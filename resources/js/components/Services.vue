<template>
    <section id="services" class="services fade-in">
        <div class="services-content">
            <div class="service-grid">
                <div class="service-item" v-for="service in services" :key="service.title">
                    <h3>{{ service.title }}</h3>
                    <p>{{ service.description }}</p>
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
                { title: 'Redes de Comunicación', description: 'Diseño de redes empresariales...' },
                { title: 'Cámaras de Seguridad', description: 'Monitoreo y control de instalaciones...' },
                { title: 'Alarmas Futuristas', description: 'Control de acceso con tecnologías biométricas...' },
                { title: 'Consultoría en Seguridad', description: 'Asesoría y soluciones personalizadas...' }
            ],
            isVisible: false // Initial state for visibility
        };
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/servicios.gif`;
        }
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
/* Servicios */
.services {
    padding: 50px 20px; /* Reduce padding for better mobile experience */
    text-align: center;
}

.services-content {
    display: flex;
    flex-direction: column;
    max-width: 1200px;
    margin: 0 auto; /* Center content */
    gap: 30px;
    padding: 40px;
    border-radius: 15px;
    /* box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); */
}

/* Sección de Lista de Servicios */
.service-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Fixed two columns */
    gap: 20px;
}

.service-item {
    padding: 20px;
    border-radius: 10px;
    transition: transform 0.3s, box-shadow 0.3s;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.service-item:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 204, 255, 0.5); /* Blue shadow */
}

.service-item h3 {
    font-size: 1.5rem; /* Adjusted for smaller screens */
    margin-bottom: 15px;
    color: #00ccff; /* Futuristic blue */
}

.service-item p {
    font-size: 0.9rem; /* Adjusted for smaller screens */
    color: #ccc;
}

/* Sección de Imagen */
.image-section {
    display: flex;
    justify-content: center;
    align-items: center; /* Center vertically if needed */
    max-width: 100%; /* Ensure the section does not overflow */
}

.image-section img {
    width: auto; /* Set width to auto */
    max-width: 100%; /* Limit maximum width to the container */
    height: auto; /* Maintain aspect ratio */
    max-height: 300px; /* Set a maximum height to prevent overflow */
    border-radius: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .service-grid {
        grid-template-columns: 1fr; /* Change to a single column on mobile */
    }

    .services-content {
        flex-direction: column; /* Maintain column direction */
    }

    .image-section {
        margin-top: 20px; /* Space between services and image */
    }
}

@media (min-width: 769px) {
    .services-content {
        flex-direction: row; /* Change to row direction for larger screens */
        justify-content: space-between; /* Space between sections */
    }

    .service-grid {
        flex: 2; /* Grid takes more space */
    }

    .image-section {
        flex: 1; /* Image section takes appropriate space */
        max-width: 300px; /* Limit the width of the image section */
    }
}
</style>
