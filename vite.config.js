import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        hmr: {
            host: 'localhost',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/project.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/project.js',
            ],
            refresh: true,
        }),
    ],
});
