<template>
        <Head title="404"/>

    <Nav/>
    <div class="flex items-center justify-center h-screen bg-black text-neutral-200">
        <div class="text-center">
            <h1 class="text-5xl font-semibold mb-4">Página No Encontrada</h1>
            <p class="text-lg mb-6">La página que buscas no está disponible. Por favor, revisa la URL o regresa a la
                página de inicio.</p>
            <Link class="bf text-white px-6 py-3 rounded-md text-xl hover:bg-neutral-600 transition-colors"
                :href="route('/')">Volver al inicio</Link>


        </div>
    </div>
</template>

<script>
import Nav from '@/Components/NavInertia.vue';
import { Link, Head } from '@inertiajs/vue3';
export default {
    components: {
        Link,
        Nav,
        Head,
    },
    name: 'NotFound',
};
</script>

<style>
.bf{
    background: #00ccff;
    color: #000;
}
</style>

