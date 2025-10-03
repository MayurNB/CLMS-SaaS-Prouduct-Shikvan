import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Keep if you have custom Laravel CSS
                'resources/js/app.js',   // Keep if you have custom Laravel JS
            ],
            refresh: true,
        }),
    ],
    // You might not even need the server block for this approach
    // as Vite won't be serving CoreUI's assets.
    // But keeping it doesn't hurt.
    server: {
        host: 'localhost',
        port: 5173,
        hmr: {
            host: 'localhost',
        },
    },
});