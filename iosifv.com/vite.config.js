import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/assets/vendor/js/jquery-2.1.1.min.js',
                'resources/assets/vendor/js/skrollr.js'
            ],
            refresh: true,
        }),
    ],
});
