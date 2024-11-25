<template>
    <Head title="Sobre"/>
    <Nav/>
    <section id="about-us-section" class="oneclickti-about-us">
        <div class="oneclickti-about-content-container oneclickti-fade-in">
            <div class="oneclickti-about-content">
                <div class="oneclickti-text-section">
                    <h2>Quiénes Somos</h2>
                    <p>
                        Somos una empresa comprometida con el futuro de la tecnología en redes y seguridad.
                        Nos dedicamos a ofrecer soluciones innovadoras para proteger y optimizar tus
                        sistemas de información.
                    </p><br>
                    <h3>Misión</h3>
                    <p>
                        En One Click TI, nos dedicamos a brindar soluciones tecnológicas integrales en conectividad de redes, seguridad y confort, ofreciendo servicios de instalación y mantenimiento de sistemas de cámaras, alarmas y aires acondicionados. Nos comprometemos a mejorar la calidad de vida de nuestros clientes mediante tecnología de vanguardia.
                    </p><br>
                    <h3>Visión</h3>
                    <p>
                        Ser líderes en el sector de redes y seguridad en la región, reconocidos por nuestra confiabilidad, innovación y excelencia en el servicio, creando ambientes seguros y cómodos para hogares y negocios.
                    </p><br>
                    <h3>Valores</h3>
                    <ul>
                        <li>Compromiso:</li>
                            <p> Nos esforzamos por satisfacer las necesidades de nuestros clientes.</p>
                        <li>Innovación:</li>
                            <p>Implementamos tecnología avanzada en cada solución.</p>
                        <li>Calidad:</li>
                            <p>Garantizamos servicios y productos de alto rendimiento.</p>
                        <li>Integridad:</li>
                            <p>Actuamos con transparencia y ética en todas nuestras operaciones.</p>
                    </ul>
                </div>
                <div class="oneclickti-image-section">
                    <img :src="logoUrl" alt="Sobre nosotros" />
                </div>
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
    name: 'AboutUs',
    mounted() {
        // Usar Intersection Observer para animar la entrada
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("oneclickti-visible");
                    }
                });
            },
            { threshold: 0.2 }
        );
        const elements = document.querySelectorAll(".oneclickti-fade-in");
        elements.forEach((element) => observer.observe(element));
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/quienes.gif`;
        },
    }
};
</script>


<style scoped>
.oneclickti-about-us {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 20px;
    font-family: 'Roboto', sans-serif;

}



.oneclickti-text-section p {
    max-width: 800px;
    margin: 0 auto;
    color: #ccc;
    /* font-size: 1.2rem; */
}

.oneclickti-text-section h2,h3,li {
    max-width: 800px;
    /* margin: 0 auto; */
    font-size: 1.2rem;
}

.oneclickti-about-content-container {
    max-width: 1200px;
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    padding: 40px;
    color: #ffffff;
}

.oneclickti-about-content {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.oneclickti-text-section,
.oneclickti-image-section {
    flex: 1;
}

.oneclickti-text-section ul {
    list-style: outside;
    padding-left: 20px;
    margin: 10px 0;
}

.oneclickti-text-section ul li {
    margin: 5px 0;
}

.oneclickti-text-section {
    padding: 20px;
    text-align: justify;
}

.oneclickti-text-section h2,
.oneclickti-text-section h3 {
    color: #00ccff;
}

.oneclickti-text-section p,
.oneclickti-text-section ul {
    margin: 10px 0;
    line-height: 1.6;
}

.oneclickti-image-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.oneclickti-image-section img {
    max-width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.oneclickti-fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.oneclickti-fade-in.oneclickti-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive design */
@media (min-width: 1025px) {
    .oneclickti-about-content {
        flex-direction: row;
    }
}
</style>
