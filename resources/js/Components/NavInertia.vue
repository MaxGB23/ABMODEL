<script>
import MenuIcon from './MenuIcon.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'App',
    components: {
        MenuIcon, // Registra el componente aquí
        Link,
    },
    data() {
        return {
            isMenuVisible: false,
            isMobile: false,
        };
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/logo.jpeg`;
        },
    },
    methods: {
        toggleMenu() {
            this.isMenuVisible = !this.isMenuVisible;
        },
        checkScreenSize() {
            this.isMobile = window.innerWidth <= 768;
            if (!this.isMobile) {
                this.isMenuVisible = false; // Cerrar el menú en pantallas grandes
            }
        },
    },
    mounted() {
        window.addEventListener('resize', this.checkScreenSize);
        this.checkScreenSize();
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkScreenSize);
    },
};
</script>
<template>
    <div id="app" class="mb-20">
        <header class="header">
            <div class="container">
                <Link :href="route('/')" class="header-logo"> <!-- Cambié 'logo' a 'header-logo' -->
                    <h1>One Click</h1>
                    <img :src="logoUrl" alt="One Click TI Logo" />
                </Link>
                <nav class="nav">
                    <MenuIcon @toggle-menu="toggleMenu" :is-menu-visible="isMenuVisible" />
                    <ul class="nav-list" :class="{ visible: isMenuVisible }">
                        <li><Link href="/">Inicio</Link></li>
                        <li><Link href="/about">Quiénes Somos</Link></li>
                        <li><Link href="/services">Servicios</Link></li>
                        <li><Link href="/contact">Contacto</Link></li>
                        <li><Link href="/faq">FAQ</Link></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>
</template>
<style scoped>
.header {
    background: #000 !important;
    color: #fff !important;
    padding: 20px 0 !important;
    position: fixed !important; /* Mantener el navbar fijo en la parte superior */
    width: 100% !important;
    top: 0 !important;
    z-index: 1000 !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

.container {
    width: 90% !important;
    margin: 0 auto !important;
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
}

/* Nuevo nombre para la clase del logo */
.header-logo {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-start !important; /* Asegura que el h1 y la imagen se alineen de manera horizontal */
}

.header-logo img {
    height: 50px !important;
    width: auto !important;
    margin-left: 10px !important;
}

/* Estilo para el h1 del logo */
.header-logo h1 {
    font-size: 1.7rem;
    color: #fff !important;
    margin: 0 !important; /* Asegúrate de que no haya margen extra */
    padding: 0 !important; /* Asegúrate de que no haya relleno extra */
    font-family: "Orbitron", sans-serif;
    font-weight: bold;

}

.nav {
    display: flex !important;
    align-items: center !important;
}

.nav-list {
    list-style: none !important;
    display: flex !important;
    padding: 0 !important;
    margin: 0 !important;
}

.nav-list li {
    margin-left: 20px !important; /* Aplícado al <li> en lugar de al <router-link> */
}

.nav-list a {
    text-transform: uppercase !important;
    font-weight: bold !important;
    padding: 10px 20px !important;
    color: #fff !important;
    text-decoration: none !important;
    transition: color 0.3s ease-in-out !important;
}

.nav-list a:hover {
    color: #00b2df !important; /* Cambiado a azul futurista */
}

/* Ajuste para el navbar móvil */
.menu-icon {
    display: none !important;
    flex-direction: column !important;
    cursor: pointer !important;
    z-index: 1000 !important;
    padding: 10px !important;
}

.menu-icon span {
    width: 30px !important;
    height: 3px !important;
    background: #fff !important;
    margin: 5px 0 !important;
    transition: all 0.3s !important;
}

/* Estilo del menú en móvil */
@media (max-width: 1024px) {
    .menu-icon {
        display: flex !important;
    }

    .nav-list {
        display: none !important; /* Por defecto, ocultar el menú */
        flex-direction: column !important;
        margin-top: 30px !important;
        position: absolute !important;
        top: 60px !important;
        left: 0 !important;
        width: 100% !important;
        background: #000 !important;
        padding: 10px 0 !important;
        border-top: 2px solid #00ccff !important;
        transition: all 0.3s ease !important;
        z-index: 999 !important;
    }

    .nav-list.visible {
        display: flex !important; /* Mostrar menú cuando está visible */
    }

    .nav-list li {
        margin: 10px 0 !important; /* Aplícado al <li> */
        text-align: center !important;
        padding: 10px !important;
        color: #fff !important;
        transition: background 0.3s, color 0.3s !important;
        border-radius: 5px !important;
    }

    .nav-list li:hover {
        background: #00ccff !important;
        /* color: #000000 !important; */
    }

    .nav-list a:hover{
        color: white;
    }
}
</style>
