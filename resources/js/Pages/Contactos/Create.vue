<script setup lang="ts">
import NavBack from '@/Components/NavBack.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { watch } from 'vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    nombre: '',
    correo: '',
    telefono: '',
    asunto: '',
    mensaje: '',
    status: '',
});

const createContacto = () => {
    form.post(route('contactos.store'));
};

// watch(form.foreign_id, (newValue) => {

// });

</script>

<template>
    <NavBack></NavBack>

    <Head title="Crear Contacto" />

    <!-- Layout Container -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:mx-32 mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 ml-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-200 mb-4 sm:mb-0">Crear Nuevo Contacto</h2>
        </div>

<!-- Form Section -->
<div class="bg-neutral-900 text-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-lg">
    <form @submit.prevent="createContacto">
        <!-- Contenedor de campos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Campo Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-300 mb-1">
                    Nombre
                </label>
                <input v-model="form.nombre" type="text" id="nombre"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Escribe el nombre"
                    :class="{ ' focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.nombre }" />
                <InputError :message="form.errors.nombre" class="mt-2" />
            </div>

            <!-- Campo Correo -->
            <div class="mb-4">
                <label for="correo" class="block text-sm font-medium text-gray-300 mb-1">
                    Correo
                </label>
                <input v-model="form.correo" type="email" id="correo"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Escribe el correo"
                    :class="{ 'text-white focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.correo }" />
                <InputError :message="form.errors.correo" class="mt-2" />
            </div>

            <!-- Campo Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="block text-sm font-medium text-gray-300 mb-1">
                    Teléfono
                </label>
                <input v-model="form.telefono" type="text" id="telefono"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Escribe el teléfono"
                    :class="{ 'text-white focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.telefono }" />
                <InputError :message="form.errors.telefono" class="mt-2" />
            </div>

            <!-- Campo Asunto -->
            <div class="mb-4">
                <label for="asunto" class="block text-sm font-medium text-gray-300 mb-1">
                    Asunto
                </label>
                <input v-model="form.asunto" type="text" id="asunto"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Escribe el asunto"
                    :class="{ 'text-white focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.asunto }" />
                <InputError :message="form.errors.asunto" class="mt-2" />
            </div>

            <!-- Campo Estado -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-300 mb-1">
                    Estado
                </label>
                <select v-model="form.status" id="status"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    :class="{ 'text-white focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.status }">
                    <option value="" disabled selected>Selecciona un estado</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="atendido">Atendido</option>
                </select>
                <InputError :message="form.errors.status" class="mt-2" />
            </div>

            <!-- Campo Mensaje -->
            <div class="mb-4 sm:col-span-1">
                <label for="mensaje" class="block text-sm font-medium text-gray-300 mb-1">
                    Mensaje
                </label>
                <textarea v-model="form.mensaje" id="mensaje" rows="1"
                    class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                    placeholder="Escribe el mensaje"
                    :class="{ 'text-white focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.mensaje }"></textarea>
                <InputError :message="form.errors.mensaje" class="mt-2" />
            </div>
        </div>

        <!-- Botones -->
        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-4">
            <Link :href="route('contactos.index')" type="button"
                class="px-6 py-2 bg-neutral-700 hover:bg-neutral-800 text-gray-300 text-sm font-medium rounded-md shadow-md focus:ring focus:ring-gray-500 focus:outline-none transition duration-200">
                Cancelar
            </Link>
            <button type="submit"
                class="px-6 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-md shadow-md focus:ring focus:ring-blue-500 focus:outline-none transition duration-200">
                Guardar
            </button>
        </div>
    </form>
</div>


    </div>
</template>
