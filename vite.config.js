import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/css/app.css',
=======
                'resources/sass/app.scss',
>>>>>>> d0cbcdfe2183facd8477fe0d0c77c93a43f940b9
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
