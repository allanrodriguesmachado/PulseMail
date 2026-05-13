import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Adicione isso para garantir que o Docker (Sail) se comunique com o navegador
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
