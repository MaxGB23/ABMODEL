<template>
    <section id="contact" class="contact fade-in visible">
        <br>
        <div class="contact-content">
            <div class="form-section">
                <h2>CONTÁCTANOS</h2><br>
                <form @submit.prevent="submitForm">
                    <input type="text" v-model="name" placeholder="Nombre" required />
                    <input type="email" v-model="email" placeholder="Correo Electrónico" required />
                    <input type="tel" v-model="phone" placeholder="Teléfono" required />
                    <textarea v-model="message" placeholder="Mensaje" required></textarea>
                    <button type="submit" class="btn">Enviar</button>
                </form>
            </div>
            <div class="image-section">
                <img :src="contactImageUrl" alt="Imagen de contacto" />
            </div>
        </div>
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
    computed: {
        contactImageUrl() {
            return `${window.location.origin}/images/contacto.jfif`;
        },
    },
    methods: {
        submitForm() {
            alert('Formulario enviado. ¡Gracias por contactarnos!');
        },
    },
};
</script>

<style scoped>
/* Contact Section */
.contact {
    padding: 50px 0;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.contact-content {
    display: flex;
    flex-direction: column;
    max-width: 1100px;
    width: 100%;
    gap: 20px;
    padding: 10px;
    color: #ffffff;
    border-radius: 15px;
}

.form-section {
    width: 100%;
}

.contact form {
    display: flex;
    flex-direction: column;
    max-width: 100%;
    margin: 0 auto;
}

.contact input,
.contact textarea {
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 5px;
    border: none;
    background: #2a2a2a;
    color: #fff;
    font-size: 1rem;
    transition: border 0.3s ease;
}

.contact input:focus,
.contact textarea:focus {
    border: 2px solid #00ccff;
    outline: none;
}

.contact button {
    padding: 15px;
    background: #00ccff;
    border: none;
    color: #000;
    font-size: 1.2rem;
    border-radius: 30px;
    cursor: pointer;
    transition: transform 0.3s, background 0.3s;
}

.contact button:hover {
    background: #0099cc;
    transform: translateY(-5px);
}

.image-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.image-section img {
    width: 100%;
    height: auto;
    margin-top: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Responsive design */
@media (min-width: 768px) {
    .contact-content {
        flex-direction: row;


    }
    .form-section {
        max-width: 50%;
        margin: 20px;

    }
    .image-section {
        max-width: 50%;
    }
}
</style>
