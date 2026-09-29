import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS principal de entrada
                'resources/css/app.css',
                'resources/css/vistas/vista-index-formato14.css',

                // Scripts JS que compilas/procesas
                'resources/js/app.js',
                'resources/assets/js/profile.js',
                'resources/assets/js/custom/custom.js',
                'resources/assets/js/custom/custom-datatable.js',

                // Archivos CSS estáticos o globales si los procesas con Vite
                'public/css/social-icons.css',
                'public/css/owl.carousel.css',
                'public/css/owl.theme.css',
                'public/css/prism.css',
                'public/css/main.css',
                'public/css/custom.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173, // Evita que busque otro puerto si el 8000 está ocupado
    },
});