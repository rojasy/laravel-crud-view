import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
