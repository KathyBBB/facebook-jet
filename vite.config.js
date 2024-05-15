import { defineConfig } from "vite";
import { visualizer } from "rollup-plugin-visualizer";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
	plugins: [
		laravel({
			input: "resources/js/app.js",
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
		visualizer({
			emitFile: true,
			filename: "stats.html",
		}),
	],
	optimizeDeps: {},
	build: {
		chunkSizeWarningLimit: 800,
		rollupOptions: {
			output: {
				manualChunks: (id) => {
					if (id.includes("node_modules")) {
						return id
							.toString()
							.split("node_modules/")[1]
							.split("/")[0]
							.toString();
					}
				},
			},
		},
	},
});
