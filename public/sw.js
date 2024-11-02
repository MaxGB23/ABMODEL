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
    "/images/icons/splash-2048x2732.png"
];

// Instalar el Service Worker
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(async (cache) => {
            console.log("Cache abierta");
            try {
                await cache.addAll(urlsToCache);
            } catch (error) {
                console.error("Error al agregar archivos a la caché:", error);
            }
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
        }).then(() => self.clients.claim())
    );
});

// Sincronización en segundo plano (sync)
self.addEventListener("sync", (event) => {
    if (event.tag === "sync-data") {
        event.waitUntil(syncData());
    }
});

// Manejar las solicitudes de la red con estrategia "network-first" para CSS y JS
self.addEventListener("fetch", (event) => {
    const url = new URL(event.request.url);

    // Estrategia "network-first" para archivos críticos en "build/assets" (CSS y JS)
    if (url.pathname.startsWith("/build/assets/")) {
        event.respondWith(
            fetch(event.request)
                .then((response) => {
                    return caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, response.clone());
                        return response;
                    });
                })
                .catch(() => caches.match(event.request))
        );
    } else {
        // Estrategia "cache-first" para los demás recursos
        event.respondWith(
            caches.match(event.request).then((response) => {
                return response || fetch(event.request);
            })
        );
    }
});

// Manejar mensajes recibidos desde la aplicación
self.addEventListener("message", (event) => {
    if (event.data && event.data.type === "SKIP_WAITING") {
        self.skipWaiting();
    }
});

// Función syncData para sincronización en segundo plano
async function syncData() {
    try {
        console.log("Sincronización en segundo plano en proceso...");
    } catch (error) {
        console.error("Error en la sincronización:", error);
    }
}
