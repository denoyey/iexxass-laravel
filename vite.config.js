import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/admin.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        sourcemap: true,
        chunkSizeWarningLimit: 3000,
        rollupOptions: {
            output: {
                manualChunks(id) {
                    if (id.includes('node_modules')) {
                        if (id.includes('pdfjs-dist')) {
                            return 'vendor-pdfjs';
                        }
                        if (id.includes('gsap')) {
                            return 'vendor-gsap';
                        }
                        if (id.includes('leaflet')) {
                            return 'vendor-leaflet';
                        }
                        return 'vendor-core';
                    }
                }
            }
        }
    },
});
