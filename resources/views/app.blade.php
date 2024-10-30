<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="manifest" href="{{ asset('manifest.json') }}">



    <link rel="apple-touch-icon" href="/images/icons/icon-192x192.png">
    <!-- Metaetiquetas para pantallas de inicio en dispositivos Apple -->
    <link rel="apple-touch-startup-image" href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px)">
    <link rel="apple-touch-startup-image" href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px)">
    <!-- Añade más enlaces para otros tamaños si es necesario -->


    <title>One Click Ti</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />




    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

</head>
<body>

    <div id="app">

    </div>


</body>

<footer class="footer">
    <p>&copy; 2024 One Click TI. Todos los derechos reservados.</p>
</footer>



</html>
