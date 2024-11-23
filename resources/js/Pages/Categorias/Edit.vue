<script setup lang="ts">
import NavBack from '@/Components/NavBack.vue';
import { Head,useForm, usePage, Link } from '@inertiajs/vue3';
import { watch } from 'vue';
import InputError from '@/Components/InputError.vue';

defineProps({
    categoria: {
        type: Object,
        required: true,
    },
});

// console.log(usePage().props.categoria)
let categoria =usePage().props.categoria.data;

const form = useForm({
    categoria: categoria.categoria,
    descripcion: categoria.descripcion,
});

const updateCategoria = () => {
    form.put(route('categorias.update',categoria.id));
};

// watch(form.foreign_id, (newValue) => {

// });

</script>

<template>
    <NavBack></NavBack>

    <Head title="Modificar Categoría" />

    <!-- Layout Container -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:mx-32 mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 ml-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-200 mb-4 sm:mb-0">Modificar Categoría</h2>
        </div>

        <!-- Form Section -->
        <div class="bg-neutral-900 text-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-lg">
            <form @submit.prevent="updateCategoria">
                <!-- Campo Categoría -->
                <div class="mb-4">
                    <label for="categoria" class="block text-sm font-medium text-gray-300 mb-1">
                        Categoría
                    </label>
                    <input
                        v-model="form.categoria" type="text" id="categoria"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe la categoría"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.categoria}" />
                    <InputError
                    :message="form.errors.categoria"
                    class="mt-2"
                    />
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-300 mb-1">
                        Descripción
                    </label>
                    <textarea v-model="form.descripcion" id="descripcion" rows="4"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe una descripción"
                        :class="{'text-white focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.categoria}">
                        </textarea>
                    <InputError
                    :message="form.errors.descripcion"
                    class="mt-2"/>
                </div>

                <!-- Botón -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-4">
                    <Link :href="route('categorias.index')"type="button"
                        class="px-6 py-2 bg-neutral-700 hover:bg-neutral-800 text-gray-300 text-sm font-medium rounded-md shadow-md focus:ring focus:ring-gray-500 focus:outline-none transition duration-200">
                        Cancelar
                    </Link>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-700 hover:bg-blue-800 text-white text-sm font-medium rounded-md shadow-md focus:ring focus:ring-blue-500 focus:outline-none transition duration-200">
                        Modificar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
