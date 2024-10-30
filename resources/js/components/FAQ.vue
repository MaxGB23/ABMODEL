<template>
    <section id="faq" class="faq">
      <h2>Preguntas Frecuentes</h2>
      <div class="faq-container">
        <div class="faq-list">
          <div
            class="faq-item"
            v-for="(faq, index) in faqs"
            :key="index"
          >
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
          <img :src="logoUrl" alt="FAQ Illustration" />
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
            question: '¿Cómo puedo crear una cuenta?',
            answer: 'Para crear una cuenta, dirígete a la página de registro y sigue las instrucciones.',
          },
          {
            question: '¿Qué métodos de pago aceptan?',
            answer: 'Aceptamos tarjetas de crédito, PayPal y transferencias bancarias.',
          },
          {
            question: '¿Puedo cancelar mi suscripción?',
            answer: 'Sí, puedes cancelar tu suscripción en cualquier momento desde tu perfil.',
          },
          {
            question: '¿Dónde puedo encontrar soporte técnico?',
            answer: 'Puedes encontrar soporte técnico en nuestra sección de ayuda o contactando a nuestro equipo.',
          },
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
            return `${window.location.origin}/images/logo.jpeg`;
        },
    }
  };
  </script>

  <style scoped>
  .faq {
    color: #fff;
    padding: 60px 20px;
    text-align: center;
  }

  .faq h2 {
    font-size: 2rem;
    margin-bottom: 30px;
  }

  .faq-container {
    display: flex; /* Usar flexbox para disposición horizontal */
    justify-content: space-between; /* Espacio entre elementos */
    align-items: flex-start; /* Alinear elementos al inicio */
    max-width: 1200px; /* Limitar el ancho total del contenedor */
    margin: 0 auto;
    flex-wrap: wrap; /* Permite que los elementos se envuelvan en pantallas pequeñas */
  }

  .faq-list {
    max-width: 600px; /* Limitar el ancho de la lista de FAQ */
    text-align: left;
    flex: 1; /* Permitir que la lista tome el espacio disponible */
  }

  .faq-item {
    margin-bottom: 20px;
    background: #1a1a1a;
    border-radius: 10px;
    overflow: hidden;
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

  /* Estilos para la imagen */
  .faq-image {
    margin-left: 20px; /* Espacio entre la lista y la imagen */
    flex: 0 0 300px; /* Espacio fijo para la imagen */
  }

  .faq-image img {
    max-width: 100%; /* La imagen se adapta al contenedor */
    height: auto; /* Mantener la relación de aspecto */
    border-radius: 10px; /* Bordes redondeados para la imagen */
  }

  /* Media Queries para dispositivos móviles */
  @media (max-width: 768px) {
    .faq-container {
      flex-direction: column; /* Cambiar a columna en pantallas pequeñas */
      align-items: center; /* Centrar los elementos */
    }

    .faq-image {
      margin-left: 0; /* Eliminar margen izquierdo */
      margin-top: 20px; /* Espacio superior para separación */
      flex: 0 0 auto; /* Permitir que la imagen ajuste su tamaño */
    }
  }
  </style>
