<template>
    <div id="app">
        <header class="header">
            <div class="container">
                <div class="logo">
                    <h1>One Click</h1>
                    <img :src="logoUrl" alt="One Click TI Logo" />
                </div>
                <nav class="nav">
                    <MenuIcon @toggle-menu="toggleMenu" :is-menu-visible="isMenuVisible" />
                    <ul class="nav-list" :class="{ visible: isMenuVisible }">
                        <li><router-link to="/">Inicio</router-link></li>
                        <li><router-link to="/about">Quiénes Somos</router-link></li>
                        <li><router-link to="/services">Servicios</router-link></li>
                        <li><router-link to="/contact">Contacto</router-link></li>
                        <li><router-link to="/faq">FAQ</router-link></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main>
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
import MenuIcon from './MenuIcon.vue'; // Asegúrate de que la ruta sea correcta

export default {
    name: 'App',
    components: {
        MenuIcon // Registra el componente aquí
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
                this.isMenuVisible = false; // Cerrar el menú en pantalla grande
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

<style scoped>
#app {
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Asegura que el contenido ocupe al menos el 100% de la altura de la pantalla */
}

.header {
    background: #000;
    color: #fff;
    padding: 20px 0;
    position: fixed; /* Mantener el navbar fijo en la parte superior */
    width: 100%;
    top: 0;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.container {
    width: 90%;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    display: flex;
    align-items: center;
}

.logo img {
    height: 50px;
    width: auto;
    margin-left: 8px;
}

.logo h1 {
    font-size: 2rem;
    color: #fff;
}

/* Navbar - Estilo original para desktop */
.nav {
    display: flex;
    align-items: center;
}

.nav-list {
    list-style: none;
    display: flex;
    padding: 0;
    margin: 0;
}

.nav-list li {
    margin-left: 20px; /* Aplícado al <li> en lugar de al <router-link> */
}

.nav-list a {
    text-transform: uppercase;
    font-weight: bold;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease-in-out;
}

.nav-list a:hover {
    color: #00b2df; /* Cambiado a azul futurista */
}

/* Ajuste para el navbar móvil */
.menu-icon {
    display: none;
    flex-direction: column;
    cursor: pointer;
    z-index: 1000;
    padding: 10px;
}

.menu-icon span {
    width: 30px;
    height: 3px;
    background: #fff;
    margin: 5px 0;
    transition: all 0.3s;
}

/* Estilo del menú en móvil */
@media (max-width: 768px) {
    .menu-icon {
        display: flex;
    }

    .nav-list {
        display: none; /* Por defecto, ocultar el menú */
        flex-direction: column;
        margin-top: 30px;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        background: #000;
        padding: 10px 0;
        border-top: 2px solid #00ccff;
        transition: all 0.3s ease;
        z-index: 999;
    }

    .nav-list.visible {
        display: flex; /* Mostrar menú cuando está visible */
    }

    .nav-list li {
        margin: 10px 0; /* Aplícado al <li> */
        text-align: center;
        padding: 10px;
        color: #fff;
        transition: background 0.3s, color 0.3s;
        border-radius: 5px;
    }

    .nav-list li:hover {
        background: #00ccff;
        color: #000;
    }
}

main {
    margin-top: 80px; /* Espacio para el navbar fijo */
    flex: 1; /* Asegura que el main ocupe el espacio restante */

}
</style>
