<script setup>
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'; // Asegúrate de importar Link desde Inertia.js

const { props } = usePage();
const activeUsers = ref(props.activeUsers || 0); // Asegúrate de tener un valor predeterminado
</script>

<template>
    <div class="min-h-screen bg-black text-white">
        <header class="bg-neutral-900 shadow-md text-center">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-white">Dashboard One Click TI</h1>
                <p class="mt-2 text-lg text-neutral-400">Resumen e Información General</p>
            </div>
        </header>

        <main class="py-8 px-4 sm:px-6 lg:px-8">
            <!-- Información General en Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 ">

                <!-- Card de Usuarios Activos -->
                <div class="bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 min-h-[250px] flex flex-col justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-user-pen text-blue-400 text-4xl"></i>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-neutral-200">Usuarios Registrados</h3>
                            <p class="text-lg text-neutral-400">{{ activeUsers }}</p>
                        </div>
                    </div>
                    <!-- Link en la Card de Usuarios -->
                    <Link :href="route('users.index')"
                        class="mt-4 inline-block text-center text-blue-400 hover:text-blue-500 text-sm font-semibold py-2 px-4 border border-blue-400 rounded-md hover:bg-blue-500 hover:text-white transition duration-200">
                        Ver Todos los Usuarios
                    </Link>
                </div>

                <!-- Card de Servicios -->
                <div class="bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 min-h-[250px] flex flex-col justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-briefcase text-green-400 text-4xl"></i>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-neutral-200">Servicios</h3>
                            <p class="text-lg text-neutral-400">Ofrecemos soluciones integradas para mejorar tu negocio</p>
                        </div>
                    </div>
                    <!-- Link en la Card de Servicios -->
                    <Link :href="route('servicios.index')"
                        class="mt-4 inline-block text-center text-green-400 hover:text-green-500 text-sm font-semibold py-2 px-4 border border-green-400 rounded-md hover:bg-green-500 hover:text-white transition duration-200">
                        Ver Servicios
                    </Link>
                </div>

                <!-- Card de Categorías -->
                <div class="bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 min-h-[250px] flex flex-col justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-list text-yellow-400 text-4xl"></i>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-neutral-200">Categorías</h3>
                            <p class="text-lg text-neutral-400">Explora diferentes áreas de nuestro contenido</p>
                        </div>
                    </div>
                    <!-- Link en la Card de Categorías -->
                    <Link :href="route('categorias.index')"
                        class=" text-center mt-4 inline-block text-yellow-400 hover:text-black text-sm font-semibold py-2 px-4 border border-yellow-400 rounded-md hover:bg-yellow-500 hover:text-white transition duration-200">
                        Ver Categorías
                    </Link>
                </div>

                <!-- Card de Contactos -->
                <div class="bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 min-h-[250px] flex flex-col justify-between">
                    <div class="flex items-center">
                        <i class="fa-solid fa-envelope-circle-check text-red-400 text-4xl"></i>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-neutral-200">Contactos</h3>
                            <p class="text-lg text-neutral-400">Encuentra la manera de ponerte en contacto con nosotros</p>
                        </div>
                    </div>
                    <!-- Link en la Card de Contactos -->
                    <Link :href="route('contactos.index')"
                        class="text-center mt-4 inline-block text-red-400 hover:text-red-500 text-sm font-semibold py-2 px-4 border border-red-400 rounded-md hover:bg-red-500 hover:text-white transition duration-200">
                        Ver Contactos
                    </Link>
                </div>

                <!-- Card de Preguntas Frecuentes -->
                <div class="bg-neutral-800 p-6 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 min-h-[250px] flex flex-col justify-between">
                    <div class="flex items-center">
                        <i class="fa-regular fa-circle-question text-purple-400 text-4xl"></i>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-neutral-200">Preguntas Frecuentes</h3>
                            <p class="text-lg text-neutral-400">Respuestas a las preguntas más comunes</p>
                        </div>
                    </div>
                    <!-- Link en la Card de Preguntas Frecuentes -->
                    <Link :href="route('faqs.index')"
                        class="mt-4 inline-block text-center text-purple-400 hover:text-purple-500 text-sm font-semibold py-2 px-4 border border-purple-400 rounded-md hover:bg-purple-500 hover:text-white transition duration-200">
                        Ver Preguntas Frecuentes
                    </Link>
                </div>
            </div>
        </main>
    </div>
</template>

<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>
