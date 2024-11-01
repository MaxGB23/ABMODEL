<template>
    <section id="about-us" class="about-us">
        <div class="about-content-container fade-in">
            <div class="about-content">
                <div class="text-section">
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
                    <p><br>
                        Ser líderes en el sector de redes y seguridad en la región, reconocidos por nuestra confiabilidad, innovación y excelencia en el servicio, creando ambientes seguros y cómodos para hogares y negocios.
                    </p><br>
                    <h3>Valores</h3>
                    <ul class="valores">
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
                <div class="image-section">
                    <img :src="logoUrl" alt="Sobre nosotros" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'AboutUs',
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
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/quienes.gif`;
        },
    }
};
</script>

<style scoped>
.about-us {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 60px 20px;
}

.valores li{
    list-style: outside;
}

.valores{
    padding-left: 20px
}
.about-content-container {
    max-width: 1200px;
    width: 100%;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    padding: 40px;
    color: #ffffff;
}

.about-content {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.text-section,
.image-section {
    flex: 1;
}

.text-section {
    padding: 20px;
    text-align: justify;
}

.text-section h2,
.text-section h3 {
    color: #00ccff;
}

.text-section p,
.text-section ul {
    margin: 10px 0;
    line-height: 1.6;
}

.text-section ul {
    list-style: none;
    padding: 0;
}

.text-section ul li {
    margin: 5px 0;
}

.image-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.image-section img {
    max-width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.fade-in {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.fade-in.visible {
    opacity: 1;
    transform: translateY(0);
}

/* Responsive design */
@media (min-width: 768px) {
    .about-content {
        flex-direction: row;
    }
}
</style>
