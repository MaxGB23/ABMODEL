<script setup lang="ts">
import NavBack from '@/components/NavBack.vue';
import { Head,useForm, Link } from '@inertiajs/vue3';
import { watch } from 'vue';
import InputError from '@/Components/InputError.vue';

const form = useForm({
    pregunta: '',
    respuesta: ''
});

const createFaq = () => {
    form.post(route('faqs.store'));
};

// watch(form.foreign_id, (newValue) => {

// });

</script>

<template>
    <NavBack></NavBack>

    <Head title="Crear Pregunta" />

    <!-- Layout Container -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:mx-32 mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 ml-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-200 mb-4 sm:mb-0">Crear Nueva Pregunta</h2>
        </div>

        <!-- Form Section -->
        <div class="bg-neutral-900 text-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-lg">
            <form @submit.prevent="createFaq">
                <!-- Campo faq -->
                <div class="mb-4">
                    <label for="faq" class="block text-sm font-medium text-gray-300 mb-1">
                        Pregunta
                    </label>
                    <input
                        v-model="form.pregunta" type="text" id="faq"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe la pregunta"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.pregunta}" />
                    <InputError
                    :message="form.errors.pregunta"
                    class="mt-2"
                    />
                </div>

                <!-- Campo Descripción -->
                <div class="mb-4">
                    <label for="respuesta" class="block text-sm font-medium text-gray-300 mb-1">
                        Respuesta
                    </label>
                    <textarea v-model="form.respuesta" id="respuesta" rows="4"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe una descripción"
                        :class="{'text-white focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.pregunta}">
                        </textarea>
                    <InputError
                    :message="form.errors.respuesta"
                    class="mt-2"/>
                </div>

                <!-- Botón -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-4">
                    <Link :href="route('faqs.index')" type="button"
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
