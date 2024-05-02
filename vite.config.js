import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        chunkSizeWarningLimit: 700,
        rollupOptions: {
            output: {
                manualChunks: (id) => {
                    if (
                        id.includes("@babylonjs/core/Engines/engine") ||
                        id.includes("@babylonjs/core/scene")                      
                    ) {
                        return 'BabylonCoreScene/';
                    }
                }
            }
        }
    }
});
