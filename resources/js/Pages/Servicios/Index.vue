<script setup>
import NavBack from '@/components/NavBack.vue';
import Pagination from '@/components/Pagination.vue';
import SearchBar from '@/components/SearchBar.vue';
import { usePage, Link, Head, useForm, router } from '@inertiajs/vue3';
import { computed, ref, watch } from "vue";

// Define props
defineProps({
    servicios: {
        type: Object,
        required: true,
    },
});

// State management
const deleteForm = useForm({});
const search = ref(usePage().props.search ?? '');
const pageNumber = ref(1);

// Computed URL for pagination and search
const serviciosUrl = computed(() => {
    const url = new URL(route("servicios.index"));
    url.searchParams.append("page", pageNumber.value);
    if (search.value) {
        url.searchParams.append("search", search.value);
    }
    return url.toString();
});

// Watchers
watch(serviciosUrl, (updatedServiciosUrl) => {
    router.visit(updatedServiciosUrl, {
        preserveScroll: true,
        preserveState: true,
        replace: true,
    });
});

watch(search, (value) => {
    if (value) pageNumber.value = 1;
});

// Delete a service
const deleteServicio = (servicioId) => {
    if (confirm('¿Estás seguro de eliminar este servicio?')) {
        deleteForm.delete(route('servicios.destroy', servicioId));
    }
};

// Update pagination number
const updatedPageNumber = (link) => {
    pageNumber.value = link.url.split("=")[1];
};
</script>

<template>
    <Head title="Servicios"></Head>
    <NavBack></NavBack>

    <!-- Layout Container -->
    <div class="max-w-7xl mx-auto px-6 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-semibold text-gray-200 ml-12">Gestión de Servicios</h2>
            <Link as="button" :href="route('servicios.create')"
                class="flex items-center bg-blue-700 text-white px-4 py-2 mr-10 rounded-full text-lg font-medium hover:bg-blue-800 transition duration-200 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                </svg>
                Nuevo Servicio
            </Link>
        </div>

        <SearchBar v-model="search" class="mx-10" />

<!-- Table Section -->
<div class="overflow-x-auto bg-neutral-800 shadow-lg rounded-lg m-7">
        <table class="min-w-full table-auto">
            <thead class="bg-black text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Imagen</th> <!-- Nueva columna -->

                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Servicio</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Descripción</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Precio</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Categoría</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Creado Por</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Modificado Por</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold uppercase tracking-wider border-b border-gray-700">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="servicio in servicios.data" :key="servicio.id"
                    class="text-center hover:bg-neutral-700 even:bg-neutral-800 odd:bg-neutral-900 text-white transition-colors duration-200">
                    <td class="px-6 py-4 text-sm font-medium text-gray-300">{{ servicio.id }}</td>
                    <!-- Columna de imagen -->
                    <td class="px-6 py-4 text-sm">
                        <!-- Mostrar imagen si está disponible -->
                        <img v-if="servicio.image_path" :src="'/storage/' + servicio.image_path" alt="Imagen del servicio" class="w-16 h-16 object-cover rounded-md" />
                        <span v-else>No disponible</span>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ servicio.servicio }}</td>
                    <td class="px-6 py-4 text-sm text-justify text-gray-300">{{ servicio.descripcion }}</td>
                    <td class="px-6 py-4 text-sm text-gray-300">${{ servicio.precio }}</td>
                    <td class="px-6 py-4 text-sm text-gray-300">{{ servicio.categoria_id?.categoria }}</td>



                    <td class="px-6 py-4 text-sm">
                        {{ servicio.created_by?.name }}
                        <br />
                        <span class="text-xs text-gray-400">{{ servicio.created_at }}</span>
                    </td>
                    <td class="px-6 py-4 text-sm">
                        {{ servicio.updated_by?.name }}
                        <br />
                        <span class="text-xs text-gray-400">{{ servicio.updated_at }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <!-- Edit Button -->
                        <Link :href="route('servicios.edit', servicio.id)"
                            class="flex items-center gap-1 text-blue-400 hover:text-blue-300 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path d="M21 11.5V19a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h7.5" />
                            <path d="M17 2.5a2.121 2.121 0 013 3l-9 9L7 15l.5-3.5 9-9z" />
                        </svg>
                        Editar
                        </Link>

                        <!-- Delete Button -->
                        <Link @click="deleteServicio(servicio.id)" :href="route('servicios.destroy', servicio.id)"
                            class="flex items-center gap-1 text-red-400 hover:text-red-300 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M9 3h6a1 1 0 011 1v2H8V4a1 1 0 011-1z" />
                            <path d="M4 7h16m-1 0v11a2 2 0 01-2 2H7a2 2 0 01-2-2V7h14z" />
                            <path d="M10 11v6m4-6v6" />
                        </svg>
                        Eliminar
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <Pagination :data="servicios" :updatedPageNumber="updatedPageNumber" />
    </div>
    </div>
</template>
