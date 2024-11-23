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

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/css/admin.css", "resources/css/tailwind.css", "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
        <link rel="icon" type="image/png" href="/images/icons/icon-48x48.png">
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
<style scoped>
    body {
        background-color: #0f0f0f;
        color: black;
    }



</style>
