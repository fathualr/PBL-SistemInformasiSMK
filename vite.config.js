import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { copy } from "vite-plugin-copy";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        copy({
            targets: [
                {
                    src: "node_modules/leaflet/dist/images/*",
                    dest: "public/images",
                },
            ],
        }),
    ],
});
