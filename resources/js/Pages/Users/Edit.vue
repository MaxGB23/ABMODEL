<script setup lang="ts">
import NavBack from '@/Components/NavBack.vue';
import { Head, useForm, usePage, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

defineProps({
    user: {
        type: Object,
        required: true,
    },
});

let user = usePage().props.user.data;

const form = useForm({
    name: user.name,
    email: user.email,
    password: '',
    password_confirmation: '',
});

const updateUser = () => {
    form.put(route('users.update', user.id));
};
</script>

<template>
    <NavBack></NavBack>

    <Head title="Modificar Usuario" />

    <!-- Layout Container -->
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8 py-8 sm:mx-32 mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 ml-6">
            <h2 class="text-2xl sm:text-3xl font-semibold text-gray-200 mb-4 sm:mb-0">Modificar Usuario</h2>
        </div>

        <!-- Form Section -->
        <div class="bg-neutral-900 text-white p-6 sm:p-8 lg:p-10 rounded-lg shadow-lg">
            <form @submit.prevent="updateUser">
                <!-- Fila 1: Nombre -->
                <div class="mb-6">
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">
                        Nombre
                    </label>
                    <input
                        v-model="form.name" type="text" id="name"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe el nombre"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.name}" />
                    <InputError
                        :message="form.errors.name"
                        class="mt-2"
                    />
                </div>

                <!-- Fila 2: Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                        Correo Electrónico
                    </label>
                    <input
                        v-model="form.email" type="email" id="email"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe el correo electrónico"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.email}" />
                    <InputError
                        :message="form.errors.email"
                        class="mt-2"
                    />
                </div>

                <!-- Fila 3: Contraseña -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
                        Contraseña
                    </label>
                    <input
                        v-model="form.password" type="password" id="password"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Escribe la nueva contraseña"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.password}" />
                    <InputError
                        :message="form.errors.password"
                        class="mt-2"
                    />
                </div>

                <!-- Fila 4: Confirmar Contraseña -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">
                        Confirmar Contraseña
                    </label>
                    <input
                        v-model="form.password_confirmation" type="password" id="password_confirmation"
                        class="block w-full px-4 py-2 text-sm text-gray-200 bg-neutral-800 border border-gray-700 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none"
                        placeholder="Confirma la contraseña"
                        :class="{' focus:ring-red-400 focus:border-red-400 border-red-300' : form.errors.password_confirmation}" />
                    <InputError
                        :message="form.errors.password_confirmation"
                        class="mt-2"
                    />
                </div>

                <!-- Botón -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-4">
                    <Link :href="route('users.index')" type="button"
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
