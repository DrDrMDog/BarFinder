import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import run from "vite-plugin-run";
import * as path from "path";
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),

        run([
            {
                name: "wayfinder",
                run: ["php", "artisan", "wayfinder:generate"],
                pattern: ["routes/**/*.php", "app/**/Http/**/*.php"],
            },
        ]),

        vue()
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
            '@component': path.resolve(__dirname, './resources/js/components'),
            '@interface': path.resolve(__dirname, './resources/js/interfaces'),

            "@actions/": "./resources/js/actions",
            "@routes/": "./resources/js/routes",
        },
    },
});
