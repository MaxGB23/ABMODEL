<template>
    <section id="contact" class="contact fade-in visible">
        <h2>Contáctanos</h2>
        <form @submit.prevent="submitForm" id="prueba">
            <input type="text" v-model="name" placeholder="Nombre" required />
            <input type="email" v-model="email" placeholder="Correo Electrónico" required />
            <input type="tel" v-model="phone" placeholder="Teléfono" required />
            <textarea v-model="message" placeholder="Mensaje" required></textarea>
            <button type="submit" class="btn">Enviar</button>
        </form>
    </section>

</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            phone: '',
            message: '',
        };
    },
    methods: {
        submitForm() {
            alert('Formulario enviado. ¡Gracias por contactarnos!');
            // Aquí podrías hacer una petición AJAX o manejar los datos
        },
    },
};
</script>

