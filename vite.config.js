import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(
            {
                input: [
                    'resources/css/app.scss',
                    'resources/js/app.js',
                ],
                valetTls: 'deraedta-be.test',
                refresh: true,
            }
        ),
    ],
});
