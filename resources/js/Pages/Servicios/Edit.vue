<script setup lang="ts">
import NavBack from '@/Components/NavBack.vue';
import { Head, useForm, usePage, Link } from '@inertiajs/vue3';
import { watch } from 'vue';
import InputError from '@/Components/InputError.vue';
import { router } from "@inertiajs/vue3";

defineProps({
    servicio: {
        type: Object,
        required: true,
    },
    categorias: {
        type: Array,
        required: true,
    },
    image_path: String,
});



let servicioData = usePage().props.servicio.data;

const form = useForm({
    image_preview: servicioData.image_path ? `/storage/${servicioData.image_path}` : '', // Usar la ruta pública de la imagen
    image_path: servicioData.image_path ? `/storage/${servicioData.image_path}` : '', // No asignar directamente desde servicioData.image_path si es una URL
    servicio: servicioData.servicio || '',
    descripcion: servicioData.descripcion || '',
    precio: servicioData.precio || '',
    categoria_id: servicioData.categoria_id,
});



const handleFileUpload = (event: Event) => {
    const file = (event.target as HTMLInputElement).files?.[0];
    if (file) {
        // Almacenar el archivo en form
        form.image_path = file;
        form.image_preview = URL.createObjectURL(file); // Almacenar la URL para la vista previa
    }
};

const updateServicio = (id: number) => {
    router.post(`/servicios/${servicioData.id}`, {
        _method: 'put',
        image_path: form.image_path,
        servicio: form.servicio,
        descripcion: form.descripcion,
        precio: form.precio,
        categoria_id: form.categoria_id,
    })


};







</script>

<template>
    <NavBack></NavBack>

    <Head title="Modificar Servicios" />

    <!-- Layout Container -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:mx-32 mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 ml-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-200 mb-4 sm:mb-0">Modificar Servicios</h2>
        </div>

        <!-- Form Section -->
        <div class="bg-neutral-900 text-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-lg">
            <form @submit.prevent="updateServicio">
                <!-- Contenedor de campos -->
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-6">
                    <!-- Campo Imagen -->
                    <!-- Campo Imagen -->
                    <div class="mb-4 text-center px-48">
                        <label for="image_path" class="block text-sm font-medium text-gray-300 mb-3">
                            Imagen
                        </label>

                        <!-- Contenedor centrado -->
                        <div class="flex justify-center items-center mb-5">
                            <img class="max-w-60" :src="form.image_preview" alt="imagen">
                        </div>

                        <div class="relative">
                            <!-- Botón de Selección de Archivo -->
                            <input type="file" id="image_path" @change="handleFileUpload"
                                class="block w-full text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none cursor-pointer file:bg-neutral-700 file:text-gray-200 file:border-0 file:rounded-md file:px-4 file:py-2"
                                :class="{ 'focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.image_path }" />
                            <!-- Texto del archivo seleccionado -->
                            <div v-if="form.image_path"
                                class="absolute top-1/2 transform -translate-y-1/2 left-4 text-sm text-gray-200">
                            </div>
                        </div>
                        <InputError :message="form.errors.image_path" class="mt-2" />
                    </div>


                </div>
                <!-- Campo Servicio -->
                <div class="mb-4">
                        <label for="servicio" class="block text-sm font-medium text-gray-300 mb-1">
                            Servicio
                        </label>
                        <input v-model="form.servicio" type="text" id="servicio"
                            class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Escribe el nombre del servicio"
                            :class="{ 'focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.servicio }" />
                        <InputError :message="form.errors.servicio" class="mt-2" />
                    </div>

                <!-- Contenedor para Categoría y Precio en la misma fila -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Campo Categoría -->
                    <div class="mb-4">
                        <label for="categoria_id" class="block text-sm font-medium text-gray-300 mb-1">
                            Categoría
                        </label>
                        <select v-model="form.categoria_id" id="categoria_id"
                            class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                            :class="{ 'focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.categoria_id }">
                            <option>Selecciona una categoría</option>
                            <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">
                                {{ categoria.categoria }}
                            </option>
                        </select>
                        <InputError :message="form.errors.categoria_id" class="mt-2" />
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-4">
                        <label for="precio" class="block text-sm font-medium text-gray-300 mb-1">
                            Precio
                        </label>
                        <input v-model="form.precio" type="text" id="precio"
                            class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                            placeholder="Escribe el precio"
                            :class="{ 'focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.precio }" />
                        <InputError :message="form.errors.precio" class="mt-2" />
                    </div>
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-300 mb-1">
                        Descripción
                    </label>
                    <textarea v-model="form.descripcion" id="descripcion" rows="3"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe la descripción del servicio"
                        :class="{ 'focus:ring-red-400 focus:border-red-400 border-red-300': form.errors.descripcion }"></textarea>
                    <InputError :message="form.errors.descripcion" class="mt-2" />
                </div>

                <!-- Botones -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-4">
                    <Link :href="route('servicios.index')" type="button"
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
