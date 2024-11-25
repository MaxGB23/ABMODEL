<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!--  Viewport para Diseño Responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Modo de pantalla completa -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Nombre de tu App">

    <!-- Íconos específicos de iOS -->
    <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/icon-180x180.png">

    <!-- Splash screens específicos de iOS (Ejemplo para iPhone X) -->
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1125x2436.png"
        media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)">
    <!-- (Repite este link para los tamaños de splash screen que desees) -->

    {{-- android --}}
    <meta name="theme-color" content="#317EFB"> <!-- Color de la barra de herramientas en Android -->

    {{-- Optimización para Dispositivos de Mayor Tamaño --}}
    <meta name="format-detection" content="telephone=no">

    <!-- Descripción y palabras clave -->
    <meta name="description" content="Breve descripción de tu sitio web">
    <meta name="keywords" content="palabras clave relevantes">

    <!-- Metatags SEO básicos -->
    <meta name="description"
        content="One Click TI: Soluciones integrales en tecnología para empresas. Optimización, soporte y asesoría en TI adaptados a tus necesidades.">
    <meta name="keywords"
        content="One Click TI, soluciones TI, soporte tecnológico, asesoría en tecnología, optimización de sistemas, tecnología empresarial">
    <meta name="author" content="One Click TI">
    <meta name="robots" content="index, follow">

    <!-- Open Graph para compartir en redes sociales -->
    <meta property="og:title" content="One Click TI - Soluciones Integrales en Tecnología">
    <meta property="og:description"
        content="Descubre cómo One Click TI puede optimizar y apoyar las necesidades tecnológicas de tu empresa con soluciones a medida y soporte profesional.">
    <meta property="og:image" content="https://www.oneclickti.com/images/logo.jpeg">
    <!-- Cambia por la URL de tu logo -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.oneclickti.com">
    <!-- Cambia por la URL del sitio web de One Click TI -->

    <!-- Twitter Card para Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="One Click TI - Soluciones Integrales en Tecnología">
    <meta name="twitter:description"
        content="Optimizamos las soluciones TI de tu empresa con servicios de soporte y asesoría adaptados a tus necesidades.">
    <meta name="twitter:image" content="URL_de_tu_imagen_principal.jpg">
    <!-- Cambia por la URL de la imagen adecuada -->


    <link rel="manifest" href="{{ asset('manifest.json') }}">



    <link rel="apple-touch-icon" href="/images/icons/icon-192x192.png">
    <!-- Metaetiquetas para pantallas de inicio en dispositivos Apple -->
    <link rel="apple-touch-startup-image" href="/images/icons/splash-640x1136.png"
        media="(device-width: 320px) and (device-height: 568px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-750x1334.png"
        media="(device-width: 375px) and (device-height: 667px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-828x1792.png"
        media="(device-width: 414px) and (device-height: 896px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1125x2436.png"
        media="(device-width: 375px) and (device-height: 812px)">
    <!-- Añade más enlaces para otros tamaños si es necesario -->


    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', 'resources/css/admin.css', 'resources/css/tailwind.css', 'resources/css/app.css', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
    <link rel="icon" type="image/png" href="/images/icons/icon-48x48.png">
    <!-- En tu archivo HTML -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <link rel="manifest" href="/manifest.webmanifest">


</head>

<body class="">
    @inertia
</body>
@include('partials.footer')

</html>
<style scoped>
    body {
        background-color: #0f0f0f;
    }
</style>




</style>
