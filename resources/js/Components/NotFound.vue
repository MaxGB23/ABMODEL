<template>
    <div class="flex items-center justify-center h-screen bg-black text-neutral-200">
        <div class="text-center">
            <h1 class="text-5xl font-semibold mb-4">Página No Encontrada</h1>
            <p class="text-lg mb-6">La página que buscas no está disponible. Por favor, revisa la URL o regresa a la
                página de inicio.</p>
            <router-link to="/"
                class="bg-neutral-700 text-white px-6 py-3 rounded-md text-xl hover:bg-neutral-600 transition-colors">
                Volver al inicio
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotFound',
};
</script>

<style scoped>
/* Estilos adicionales si es necesario */
</style>
