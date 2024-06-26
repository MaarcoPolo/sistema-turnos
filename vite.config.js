import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    //build: {
    //    chunkSizeWarningLimit: 1600,
    //},
    // server: {
    //     // host: true
    //     hmr: {
    //         host: "127.0.0.1",
    //         protocol: "ws",
    //     },
    // }
});
