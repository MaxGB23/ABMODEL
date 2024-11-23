<template>
    <section id="home" class="hero fade-in">
        <div class="hero-content fade-in">
            <h2>Soluciones Inteligentes para un Futuro Seguro</h2>
            <p>Descubre el futuro de la tecnología en redes y seguridad</p>
            <!-- <a href="#services" class="btn fade-in">Ver Servicios</a> -->
            <br>
            <router-link class="btn" to="/services">Ver servicios</router-link>
        </div>
    </section>
    <main>
            <router-view></router-view>
    </main>
</template>

<script>
export default {
    name: 'Home',
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
};
</script>

<style scoped>




/* Hero Section */
.hero {
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
        url("/public/images/logo.jpeg") no-repeat center center/cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    opacity: 0;
    animation: fadeInBackground 1.5s ease-out forwards;
}

.hero-content {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

.hero-content.visible {
    opacity: 1;
    transform: translateY(0);
}

.hero h2 {
    font-size: 4rem;
    text-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
}

.hero p {
    margin: 20px 0;
    font-size: 1.5rem;
}

.btn {
    background: #00ccff;
    color: #000;
    padding: 15px 35px;
    border-radius: 30px;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 1.2rem;
    transition: transform 0.3s, background 0.3s;
    text-decoration: none;
}

.btn:hover {
    background: #0099cc;
    transform: translateY(-5px);
}

/* Animations */
@keyframes fadeInBackground {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>
