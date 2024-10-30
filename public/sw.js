const CACHE_NAME = "OneClickPWA";
const urlsToCache = [

    "/", // Página principal
    "/about", // Acerca de
    "/contact", // Contacto
    "/services", // Servicios
    "/faq", // Preguntas Frecuentes
    "/resources/css/app.css", // CSS
    "/resources/js/app.js", // JavaScript
    "/manifest.json", // Manifesto de la aplicación
    "/images/icons/icon-192x192.png", // Ícono
    "/images/icons/icon-512x512.png", // Ícono
];

// Instalar el Service Worker
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log("Cache abierta");
            return cache.addAll(urlsToCache);
        })
    );
});

// Activar el Service Worker y limpiar la caché antigua
self.addEventListener("activate", (event) => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (!cacheWhitelist.includes(cacheName)) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Manejar las solicitudes de la red
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((response) => {
            return response || fetch(event.request);
        })
    );
});

// Manejar mensajes recibidos desde la aplicación
self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();  // Forzar la activación inmediata del nuevo SW
    }
});
