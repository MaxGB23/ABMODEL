<template>
    <div class="logo-container">
        <!-- Reemplaza el src con la ruta de tu imagen JPEG -->
        <img src="/images/logo.jpeg" alt="Mi Logo" class="logo" />
    </div>
</template>

<script setup>
// Si necesitas hacer algo en el script, lo puedes agregar aquí
</script>

<style scoped>
.logo-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.logo {
    width: 40px;
    height: auto;
    border-radius: 5px;
}
</style>
