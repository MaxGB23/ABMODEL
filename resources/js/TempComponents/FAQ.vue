<template>
    <section id="faq" class="faq">
        <h2>Preguntas Frecuentes</h2>
        <div class="faq-container">
            <div class="faq-list">
                <div class="faq-item" v-for="(faq, index) in faqs" :key="index">
                    <div class="faq-question" @click="toggleFAQ(index)">
                        <h3>{{ faq.question }}</h3>
                        <span class="icon" :class="{ 'expanded': isExpanded(index) }">+</span>
                    </div>
                    <transition name="fade">
                        <div v-show="isExpanded(index)" class="faq-answer">
                            <p>{{ faq.answer }}</p>
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
export default {
    data() {
        return {
            faqs: [
                {
                    question: '¿Cómo puedo solicitar un servicio?',
                    answer: 'Para solicitar un servicio, contáctanos a través de nuestro formulario de contacto o por teléfono. Nuestro equipo te responderá a la brevedad.',
                },
                {
                    question: '¿Qué métodos de pago aceptan?',
                    answer: 'Aceptamos tarjetas de crédito, PayPal y transferencias bancarias.',
                },
                {
                    question: '¿Ofrecen soporte técnico remoto?',
                    answer: 'Sí, brindamos soporte técnico remoto para ayudarte con problemas en tus sistemas de seguridad y redes de comunicación.',
                },
                {
                    question: '¿Cuánto tiempo tarda la instalación de los equipos?',
                    answer: 'El tiempo de instalación depende del servicio y la magnitud del proyecto, pero generalmente se completa en 1 a 3 días.',
                },
                {
                    question: '¿Qué áreas cubren sus servicios?',
                    answer: 'Ofrecemos nuestros servicios en la región, tanto para empresas como para hogares. Contáctanos para saber si cubrimos tu ubicación.',
                },
                {
                    question: '¿Realizan visitas de mantenimiento?',
                    answer: 'Sí, ofrecemos visitas de mantenimiento periódicas para asegurar el óptimo funcionamiento de los equipos instalados.',
                }
            ],

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
    }
};
</script>

<style scoped>


.faq {
    color: #fff;
    padding: 40px 20px;
    text-align: center;


}

.faq h2 {
    font-size: 2rem;
    margin-bottom: 30px;
}



.faq-container {
    display: flex;
    /* Usar flexbox para disposición horizontal */
    justify-content: space-between;
    /* Espacio entre elementos */
    align-items: flex-start;
    /* Alinear elementos al inicio */
    max-width: 1120px;
    /* Limitar el ancho total del contenedor */
    margin: 0 auto;
    flex-wrap: wrap;
    /* Permite que los elementos se envuelvan en pantallas pequeñas */



}

.faq-list {
    max-width: 500px;
    /* Limitar el ancho de la lista de FAQ */
    text-align: left;
    flex: 1;
    /* Permitir que la lista tome el espacio disponible */
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

.faq-image {
    flex: 1;
    display: flex;
    flex-direction: column; /* Colocar las imágenes en una columna */
    align-items: center;
    justify-content: center;
    margin-left: 20px;
    margin-top: 0;
}

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
@media (max-width: 768px) {
    .faq-container {
        flex-direction: column;
        /* Cambiar a columna en pantallas pequeñas */
        align-items: center;
    }

    .faq-image {
        margin-left: 0;
        margin-top: 20px;
        flex: 0 0 auto;
        /* Permitir que la imagen ajuste su tamaño */
    }
}
</style>
