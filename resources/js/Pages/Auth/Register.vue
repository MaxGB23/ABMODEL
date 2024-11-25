<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Registro" />

        <div class="left-box">
            <h2 class="">Crear Cuenta</h2>
            <div class="input-group">
                <label for="name">Nombre Completo</label>
                <input id="name" type="text" v-model="form.name" required placeholder="Ingresa tu nombre completo" />
                <InputError :message="form.errors.name" />
            </div>

            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input id="email" type="email" v-model="form.email" required
                    placeholder="Ingresa tu correo electrónico" />
                <InputError :message="form.errors.email" />
            </div>

            <div class="input-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" v-model="form.password" required
                    placeholder="Crea una contraseña" />
                <InputError :message="form.errors.password" />
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input id="password_confirmation" type="password" v-model="form.password_confirmation" required
                    placeholder="Repite tu contraseña" />
                <InputError :message="form.errors.password_confirmation" />
            </div>

            <button @click="submit" class="btn-login">Registrarme</button>


        </div>

        <div class="right-box">
            <img src="/images/logo.jpeg" alt="Logo" class="logo">
            <h2>Bienvenido a One Click Ti</h2>
            <p>Regístrate para acceder al Panel de Control</p>
            <!-- Botón único de "Crear Cuenta" con <Link> de Inertia -->
            <Link :href="route('login')" class="btn-signup">
                Inicia Sesión
            </Link>

        </div>
    </GuestLayout>
</template>

<style scoped>
/* altura input */
.input-group input {
    height: 40px;
}

.left-box h2 {
    margin-bottom: 0px;
}

.left-box{
    color: #000 !important;
}
</style>
