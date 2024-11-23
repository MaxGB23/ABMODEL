<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<!-- GuestLayout.vue -->
<template>
    <div class="login-container">
        <div class="login-box">
            <slot /> <!-- Esto permitirá insertar el contenido del login -->
        </div>
    </div>
</template>
