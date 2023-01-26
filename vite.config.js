import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js' , 'resources/css/bootstrap-5.3.css' ,'resources/js/src/bootstrap-5.3.js'],
            refresh: true,
        }),
    ],
});
