<script setup>
import Admin from '@/Components/Admin.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Admin></Admin>
    </AuthenticatedLayout>
</template>


