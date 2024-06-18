import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

// flex absolute top-0 left-0 flex-col justify-center items-center place-items-center px-5 py-2.5 w-full h-52 text-center rounded-lg border-2 border-dashed opacity-75 transition cursor-pointer dz-message group hover:bg-muted/25 background-muted border-muted-foreground/25 rounded-3 text-muted ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2