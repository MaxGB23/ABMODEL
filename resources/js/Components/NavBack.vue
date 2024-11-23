<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

// Estado para el dropdown de navegación
const showingNavigationDropdown = ref(false);

// Estado para el tema
const isDarkMode = ref(false);

// Función para alternar el tema
const toggleTheme = () => {
    isDarkMode.value = !isDarkMode.value;
    document.documentElement.classList.toggle('dark', isDarkMode.value);
    localStorage.setItem('theme', isDarkMode.value ? 'dark' : 'light');
};

// Al cargar la página, verifica si hay un tema guardado
if (localStorage.getItem('theme') === 'dark') {
    isDarkMode.value = true;
    document.documentElement.classList.add('dark');
} else {
    isDarkMode.value = false;
    document.documentElement.classList.remove('dark');
}
</script>

<template>
    <nav class="border-b border-neutral-600 bg-black">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 justify-between items-center">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex shrink-0 items-center">
                        <Link :href="route('dashboard')">
                            <ApplicationLogo class="block h-9 w-auto fill-current text-white" />
                        </Link>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </NavLink>
                        <NavLink :href="route('users.index')" :active="route().current('users.index')">
                            Usuarios
                        </NavLink>
                        <NavLink :href="route('categorias.index')" :active="route().current('categorias.index')">
                            Categorías
                        </NavLink>
                        <NavLink :href="route('servicios.index')" :active="route().current('servicios.index')">
                            Servicios
                        </NavLink>
                        <NavLink :href="route('contactos.index')" :active="route().current('contactos.index')">
                            Contactos
                        </NavLink>
                        <NavLink :href="route('faqs.index')" :active="route().current('faqs.index')">
                            Faq
                        </NavLink>
                    </div>
                </div>

                <!-- User Menu and Theme Toggle Button -->
                <div class="hidden sm:ms-6 sm:flex sm:items-center space-x-4">
                    <!-- User Dropdown -->
                    <div class="relative ms-3">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center rounded-md border border-transparent bg-neutral-900 px-3 py-2 text-sm font-medium leading-4 text-gray-300 transition duration-150 ease-in-out hover:text-white focus:outline-none">
                                        {{ $page.props.auth.user.name }}
                                        <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                            </template>
                        </Dropdown>
                    </div>

                    <!-- Theme Toggle Button -->
                    <button @click="toggleTheme"
                        class="inline-flex items-center rounded-md border border-transparent bg-neutral-900 px-3 py-2 text-sm font-medium text-gray-300 transition duration-150 ease-in-out hover:text-white focus:outline-none">
                        <span v-if="isDarkMode" class="text-white">🌙</span>
                        <span v-else class="text-white">🌞</span>
                    </button>
                </div>

                <!-- Hamburger Button -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-700 hover:text-white focus:bg-gray-700 focus:text-white focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{
                                hidden: showingNavigationDropdown,
                                'inline-flex': !showingNavigationDropdown
                            }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{
                                hidden: !showingNavigationDropdown,
                                'inline-flex': showingNavigationDropdown
                            }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden">
            <div class="space-y-1 pb-3 pt-2">
                <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                    Dashboard
                </ResponsiveNavLink>
                <ResponsiveNavLink :href="route('categorias.index')" :active="route().current('categorias.index')">
                    Categorías
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="border-t border-gray-700 pb-1 pt-4">
                <div class="px-4">
                    <div class="text-base font-medium text-white">{{ $page.props.auth.user.name }}</div>
                    <div class="text-sm font-medium text-gray-400">{{ $page.props.auth.user.email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('profile.edit')">Profile</ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">Log Out</ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>
