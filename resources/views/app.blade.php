<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compatibilidad para modo de pantalla completa en dispositivos móviles -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="One Click TI">
    <meta name="application-name" content="One Click TI"> <!-- Nombre de la aplicación para Android -->
    <!-- Iconos para iOS -->
    <link rel="apple-touch-icon" sizes="192x192" href="/images/icons/icon-192x192.png">
    <!-- Splash screens para iOS en diferentes dispositivos -->
    <link rel="apple-touch-startup-image" href="/images/icons/splash-640x1136.png"
        media="(device-width: 320px) and (device-height: 568px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-750x1334.png"
        media="(device-width: 375px) and (device-height: 667px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-828x1792.png"
        media="(device-width: 414px) and (device-height: 896px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1125x2436.png"
        media="(device-width: 375px) and (device-height: 812px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1242x2208.png"
        media="(device-width: 414px) and (device-height: 736px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1536x2048.png"
        media="(device-width: 768px) and (device-height: 1024px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1668x2224.png"
        media="(device-width: 834px) and (device-height: 1112px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1668x2388.png"
        media="(device-width: 834px) and (device-height: 1194px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-2048x2732.png"
        media="(device-width: 1024px) and (device-height: 1366px)">

    <!-- Color de la barra de herramientas para Android -->
    <meta name="theme-color" content="#317EFB">

    <!-- Personalización de la barra de tareas en Windows -->
    <meta name="msapplication-TileColor" content="#317EFB">
    <meta name="msapplication-TileImage" content="/images/icons/icon-144x144.png">

    <!-- Optimización para dispositivos de mayor tamaño y formato de detección -->
    <meta name="format-detection" content="telephone=no">

    <!-- Descripción y palabras clave SEO -->
    <meta name="description"
        content="One Click TI: Soluciones integrales en tecnología para empresas. Optimización, soporte y asesoría en TI adaptados a tus necesidades.">
    <meta name="keywords"
        content="One Click TI, soluciones TI, soporte tecnológico, asesoría en tecnología, optimización de sistemas, tecnología empresarial">
    <meta name="author" content="One Click TI">
    <meta name="robots" content="index, follow">

    <!-- Open Graph para redes sociales -->
    <meta property="og:title" content="One Click TI - Soluciones Integrales en Tecnología">
    <meta property="og:description"
        content="Descubre cómo One Click TI puede optimizar y apoyar las necesidades tecnológicas de tu empresa con soluciones a medida y soporte profesional.">
    <meta property="og:image" content="https://www.oneclickti.com/images/logo.jpeg">
    <!-- Cambia por la URL de tu logo -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.oneclickti.com">
    <!-- Cambia por la URL del sitio web de One Click TI -->


    <title>One Click Ti</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <link rel="manifest" href="{{ asset('manifest.json') }}">

</head>

<body>

    <div id="app">

    </div>


</body>

@include('partials.footer')

{{-- <footer class="footer">
    <p>&copy; 2024 One Click TI. Todos los derechos reservados.</p>
</footer> --}}



</html>
