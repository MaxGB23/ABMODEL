<template>
        <Head title="FAQ"/>

    <Nav />
    <section id="faq" class="faq">
        <h1>Preguntas Frecuentes</h1>
        <div class="faq-container">
            <div class="faq-list">
                <div class="faq-item" v-for="(faq, index) in faqs" :key="index">
                    <div class="faq-question" @click="toggleFAQ(index)">
                        <h3>{{ faq.pregunta }}</h3>
                        <span class="icon" :class="{ 'expanded': isExpanded(index) }">+</span>
                    </div>
                    <transition name="fade">
                        <div v-show="isExpanded(index)" class="faq-answer">
                            <p>{{ faq.respuesta }}</p>
                        </div>
                    </transition>
                </div>
            </div>
            <div class="faq-image">
                <img :src="logoUrl" alt="FAQ OneClickTI" />
                <img :src="logoUrl2" alt="FAQ OneClickTI" />
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
        faqs: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            expandedIndex: null,
        };
    },
    methods: {
        toggleFAQ(index) {
            this.expandedIndex = this.expandedIndex === index ? null : index;
        },
        isExpanded(index) {
            return this.expandedIndex === index;
        },
    },
    computed: {
        logoUrl() {
            return `${window.location.origin}/images/faq2.gif`;
        },
        logoUrl2() {
            return `${window.location.origin}/images/faq3.jpeg`;
        },
    },
};
</script>

<style scoped>


.faq {
    color: #fff;
    padding: 40px 20px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}

.faq h1 {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 30px;



}



.faq-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    max-width: 1120px;
    margin: 0 auto;
    flex-wrap: wrap;
}

.faq-list {
    flex: 1;
    text-align: left;
    width: 100%;
    /* Elimina el max-width para que ocupe todo el espacio disponible */
}

.faq-image {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-left: 20px;
    margin-top: 0;
    width: 100%; /* Hacer que la imagen ocupe el 100% de la fila */
}

.faq-item {
    margin-bottom: 20px;
    background: #1a1a1a;
    border-radius: 10px;
    overflow: hidden;
    /* margin-bottom: 60px; */
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    cursor: pointer;
    transition: background 0.3s;
}

.faq-question:hover {
    background: #222;
    color: #00b2df;
}

.faq-question h3 {
    font-size: 1.5rem;
    margin: 0;
}

.icon {
    font-size: 1.5rem;
    transition: transform 0.3s;
}

.icon.expanded {
    transform: rotate(45deg);
}

.faq-answer {
    padding: 15px;
    background: #2a2a2a;
    border-top: 1px solid #444;
}

/* Animación de Fade */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease, max-height 0.2s ease;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
    max-height: 0;
}

.fade-enter-to,
.fade-leave {
    opacity: 1;
    max-height: 100px;
}

/* .faq-image {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-left: 20px;
    margin-top: 0;
} */

.faq-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px; /* Espacio entre las imágenes */
}

.faq-image img:last-child {
    margin-bottom: 0; /* Elimina el margen en la última imagen */
}

/* Media Queries para dispositivos móviles */
@media (max-width: 1024px) {
    .faq-container {
        flex-direction: column;
        /* Cambiar a columna en pantallas pequeñas */
        align-items: center;
        width: 90%;
    }


    .faq-image {
        margin-left: 0;
        margin-top: 20px;
        flex: 0 0 auto;
        /* Permitir que la imagen ajuste su tamaño */
    }
}
</style>
