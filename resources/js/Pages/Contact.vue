<template>
        <Head title="Contacto"/>

    <Nav />
    <section id="contact" class="contact fade-in visible">
        <br>
        <div class="contact-content">
            <div class="form-section">
                <h1 class="mb-7">CONTÁCTANOS</h1>

                <form @submit.prevent="createContacto">
                    <!-- Campo Nombre -->
                    <div class="field">
                        <input type="text" v-model="form.nombre" placeholder="Nombre"
                            :class="{ 'input-error': form.errors.nombre }" />
                        <InputError :message="form.errors.nombre" class="error-message" />
                    </div>

                    <!-- Campo Correo -->
                    <div class="field">
                        <input type="email" v-model="form.correo" placeholder="Correo Electrónico"
                            :class="{ 'input-error': form.errors.correo }" />
                        <InputError :message="form.errors.correo" class="error-message" />
                    </div>

                    <!-- Campo Teléfono -->
                    <div class="field">
                        <input type="tel" v-model="form.telefono" placeholder="Teléfono"
                            :class="{ 'input-error': form.errors.telefono }" />
                        <InputError :message="form.errors.telefono" class="error-message" />
                    </div>

                    <!-- Campo Asunto -->
                    <div class="field">
                        <input type="text" v-model="form.asunto" placeholder="Asunto"
                            :class="{ 'input-error': form.errors.asunto }" />
                        <InputError :message="form.errors.asunto" class="error-message" />
                    </div>

                    <!-- Campo Mensaje -->
                    <div class="field">
                        <textarea v-model="form.mensaje" placeholder="Mensaje"
                            :class="{ 'input-error': form.errors.mensaje }"></textarea>
                        <InputError :message="form.errors.mensaje" class="error-message" />
                    </div>

                    <!-- Botón -->
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
import Nav from '@/Components/NavInertia.vue';
import { useForm, Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

export default {
    components: {
        Nav,
        InputError,
        Head,
    },
    setup() {
        const form = useForm({
            nombre: '',
            correo: '',
            telefono: '',
            asunto: '',
            mensaje: '',
            status: 'pendiente',
        });

        const createContacto = () => {
            form.post(route('contactos.store'), {
                onError: (errors) => {
                    console.error(errors);
                },
                onSuccess: () => {
                    alert('¡Mensaje enviado correctamente!');
                    form.reset(); // Limpia el formulario después del envío exitoso.
                },
            });
        };

        const contactImageUrl = `${window.location.origin}/images/contacto.jfif`;

        return {
            form,
            createContacto,
            contactImageUrl,
        };
    },
};
</script>

<style scoped>
/* Contact Section */
.contact {
    padding: 5px 50px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-family: 'Roboto', sans-serif;
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

/* Ajusta las proporciones para pantallas grandes */
@media (min-width: 1025px) {
    .contact-content {
        flex-direction: row;
        justify-content: space-between;
    }

    /* El form-section ocupará menos espacio */
    .form-section {
        flex: 1;
        max-width: 40%;
        margin: 20px;
    }

    /* La imagen ocupará más espacio */
    .image-section {
        flex: 1.5;
        max-width: 55%;
    }
}

/* Estilo para la sección de formulario */
.form-section h1 {
    font-size: 1.8rem;
    font-weight: bold;
}

/* Estilo del formulario */
.contact form {
    display: flex;
    flex-direction: column;
    max-width: 100%;
    margin: 0 auto;
    width: 100%;
}

.contact input,
.contact textarea,
.contact button {
    margin-bottom: 15px;
    padding: 15px;
    border-radius: 5px;
    border: none;
    background: #2a2a2a;
    color: #fff;
    font-size: 1rem;
    transition: border 0.3s ease, background 0.3s ease;
    width: 100%;
    /* Ajusta el ancho al contenedor */
    box-sizing: border-box;
    /* Incluye padding y border en el ancho total */
}

.contact input:focus,
.contact textarea:focus {
    border: 2px solid #00ccff;
    outline: none;
}

/* Estilo para el botón */
.contact button {
    background: #00ccff;
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

/* Estilo para la imagen */
.image-section {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.image-section img {
    width: 100%;
    margin-top: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

/* Diseño responsive para pantallas pequeñas */
@media (max-width: 768px) {
    .contact-content {
        flex-direction: column;
    }

    .form-section,
    .image-section {
        max-width: 100%;
    }
}

/* Estilo de errores */
.input-error {
    border: 2px solid #ff4d4d;
}

.error-message {
    color: #ff4d4d;
    font-size: 0.9rem;
    margin-top: -10px;
    margin-bottom: 10px;
}
</style>
