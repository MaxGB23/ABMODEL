import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { VitePWA } from 'vite-plugin-pwa';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        VitePWA({
            registerType: 'autoUpdate',
            includeAssets: [
                '/favicon.ico',
                '/robots.txt',
                '/images/icons/icon-192x192.png',
                '/images/icons/icon-512x512.png',
            ],
            manifest: {
                name: 'One Click Ti',
                short_name: 'One Click',
                description: 'PWA OneClickTi',
                start_url: '/',
                display: 'standalone',
                background_color: '#ffffff',
                theme_color: '#000000',
                orientation: 'any',
                icons: [
                    { src: '/images/icons/icon-72x72.png', sizes: '72x72', type: 'image/png' },
                    { src: '/images/icons/icon-96x96.png', sizes: '96x96', type: 'image/png' },
                    { src: '/images/icons/icon-128x128.png', sizes: '128x128', type: 'image/png' },
                    { src: '/images/icons/icon-144x144.png', sizes: '144x144', type: 'image/png' },
                    { src: '/images/icons/icon-152x152.png', sizes: '152x152', type: 'image/png' },
                    { src: '/images/icons/icon-192x192.png', sizes: '192x192', type: 'image/png' },
                    { src: '/images/icons/icon-384x384.png', sizes: '384x384', type: 'image/png' },
                    { src: '/images/icons/icon-512x512.png', sizes: '512x512', type: 'image/png' },
                ],
                splash_screens: [
                    { src: '/images/icons/splash-640x1136.png', sizes: '640x1136', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-750x1334.png', sizes: '750x1334', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-828x1792.png', sizes: '828x1792', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-1125x2436.png', sizes: '1125x2436', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-1242x2208.png', sizes: '1242x2208', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-1536x2048.png', sizes: '1536x2048', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-1668x2224.png', sizes: '1668x2224', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-1668x2388.png', sizes: '1668x2388', type: 'image/png', orientation: 'portrait' },
                    { src: '/images/icons/splash-2048x2732.png', sizes: '2048x2732', type: 'image/png', orientation: 'portrait' },
                ],
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
});
