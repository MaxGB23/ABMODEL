<script setup>
import { router, usePage } from '@inertiajs/vue3';

defineProps({
    data: {
        type: Object,
        required: true,
    },
    updatedPageNumber: {
        type: Function,
        required: true,
    },
});



// console.log((usePage().props.data.meta));
// const updatePageNumber = (link) => {
//     let pageNumber = link.url.split("=")[1];
//     router.visit('/categorias?page=' + pageNumber,{
//         preserveScroll: true,
//     });
// }

</script>
<template>

    <div class="flex items-center justify-between border-t border-gray-700 bg-black px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-gray-800 px-4 py-2 text-sm font-medium text-gray-400 hover:bg-gray-700">Previous</a>
            <a href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-gray-800 px-4 py-2 text-sm font-medium text-gray-400 hover:bg-gray-700">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-200">
                    Mostrando
                    <span class="font-medium">{{ data.meta.from }}</span>
                    -
                    <span class="font-medium">{{ data.meta.to }}</span>
                    de
                    <span class="font-medium">{{ data.meta.total }}</span>
                    resultados
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                    <button
                    @click.prevent="updatedPageNumber(link)"
                        v-for="(link,index) in data.meta.links"
                        :key="index"
                        :disabled="link.active || !link.url"
                        class="relative inline-flex items-center px-4 py-2 text-sm border border-gray-600 font-semibold focus:z-20 focus:outline-none"
                        :class="{
                            'z-10 bg-black text-white': link.active, // Botón activo
                            'bg-neutral-900 text-gray-400 hover:bg-neutral-800 hover:text-gray-200': !link.active // Botón inactivo
                        }">
                        <span v-html="link.label"></span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Estilo adicional para asegurar un tema oscuro */
a:focus {
    outline: 2px solid #4a5568;
    /* Gris oscuro para enfoque */
    outline-offset: 2px;
}
</style>
