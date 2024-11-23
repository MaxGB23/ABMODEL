<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Inicio de Sesión" />

    <GuestLayout>
        <div class="left-box">
            <h2 class="">Iniciar Sesión</h2>
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" v-model="form.email" required placeholder="Ingresa tu correo" />
                <InputError :message="form.errors.email" />
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" v-model="form.password" required
                    placeholder="Ingresa tu contraseña" />
                <InputError :message="form.errors.password" />
            </div>

            <div class="options">
                <label>
                    <input type="checkbox" v-model="form.remember" />
                    Recordarme
                </label>
                <Link v-if="canResetPassword" :href="route('password.request')">¿Olvidaste tu contraseña?</Link>
            </div>

            <button @click="submit" class="btn-login">Iniciar Sesión</button>
        </div>

        <div class="right-box">
            <img src="/images/logo.jpeg" alt="Logo" class="logo">
            <h2>Bienvenido a One Click Ti</h2>
            <p>Inicia Sesión para continuar</p>

            <!-- Botón único de "Crear Cuenta" con <Link> de Inertia -->
            <Link :href="route('register')" class="btn-signup">
            Crear Cuenta
            </Link>
        </div>
    </GuestLayout>
</template>

<style scoped>
/* Variables de colores para degradados */
:root {
    --primary-color: #00c6ff; /* Degradado azul brillante */
    --secondary-color: #0072ff; /* Color de transición al azul */
    --background-color-light: #f7f7f7; /* Fondo claro */
    --background-color-dark: #181818; /* Fondo oscuro */
    --text-color-light: #333;
    --text-color-dark: #f0f0f0;
}

h2{
    margin-bottom: 10px;

}

.btn-login{
    margin-top: 10px;
}

/* input margin */
.input-group{
    margin-bottom: 10px;

}

.input-group label{
    margin-bottom: 8px;
}
/* Estilos base */
/* body {

    /* font-family: "Arial", sans-serif;
    background-color: var(--background-color-light) !important  ;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    transition: background-color 0.1s;
    -webkit-transition: background-color 0.1s;
    -moz-transition: background-color 0.1s;
    -ms-transition: background-color 0.1s;
    -o-transition: background-color 0.1s; */

</style>
