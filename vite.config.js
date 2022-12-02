import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/expense.js', 'resources/js/product.js', 'resources/js/table.js'],
            refresh: true,
        }),
    ],
});
