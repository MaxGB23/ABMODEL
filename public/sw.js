const CACHE_NAME = "OneClickPWA-v1";
const urlsToCache = [
    "/", // Página principal
    "/about", // Acerca de
    "/contact", // Contacto
    "/services", // Servicios
    "/faq", // Preguntas Frecuentes
    "/manifest.json", // Manifest de la aplicación
    "/images/icons/icon-144x144.png",
    "/images/icons/icon-192x192.png",
    "/images/icons/icon-512x512.png",
    "/images/icons/icon-96x96.png",
    // Splash screens
    "/images/icons/splash-640x1136.png",
    "/images/icons/splash-750x1334.png",
    "/images/icons/splash-1125x2436.png",
    "/images/icons/splash-1536x2048.png",
    "/images/icons/splash-2048x2732.png",
    "/images/icons/icon-48x48.png",
    // Otros recursos estáticos importantes (fuentes, etc.)
    "https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap",
    "https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Poppins:wght@400;600&display=swap",
];

// Instalar el Service Worker
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(async (cache) => {
            console.log("Cache abierta");
            // Agregar archivos estáticos a la caché
            await cache.addAll(urlsToCache);

            // Agregar archivos generados dinámicamente por Vite (JS, CSS)
            const viteFiles = [
                "/build/assets/js/app.js",
                "/build/assets/css/app.css",
                "/build/assets/css/admin.css",
                "/build/assets/css/tailwind.css",
            ];
            await cache.addAll(viteFiles);
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
                        return caches.delete(cacheName); // Elimina cachés antiguas
                    }
                })
            );
        }).then(() => self.clients.claim()) // Activa el Service Worker inmediatamente
    );
});

// Manejar las solicitudes de la red con estrategia "network-first" para los archivos dinámicos
self.addEventListener("fetch", (event) => {
    const url = new URL(event.request.url);

    // Asegurarse de que la solicitud sea para los archivos generados por Vite en /build/assets/
    if (url.pathname.startsWith("/build/assets/")) {
        event.respondWith(
            fetch(event.request)
                .then((response) => {
                    return caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, response.clone()); // Cachea la respuesta
                        return response;
                    });
                })
                .catch(() => caches.match(event.request)) // Si no hay red, responde con lo que está en caché
        );
    } else {
        // Estrategia "cache-first" para otros recursos como fuentes e imágenes
        event.respondWith(
            caches.match(event.request).then((response) => {
                return response || fetch(event.request); // Si no está en caché, realiza la solicitud de red
            })
        );
    }
});

// Manejar mensajes recibidos desde la aplicación (si se desea actualizar el SW de inmediato)
self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting(); // Permite que el SW se active inmediatamente
    }
});

// Función para sincronización en segundo plano (si se requiere)
async function syncData() {
    try {
        console.log("Sincronización en segundo plano en proceso...");
    } catch (error) {
        console.error("Error en la sincronización:", error);
    }
}
