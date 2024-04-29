import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
		"./node_modules/flowbite/**/*.js",
    ],

    theme: {
		extend: {
			colors: {
				ogred: {
					DEFAULT: "#B31942",
					50: "#FFFFFF",
					100: "#FDEDF1",
					200: "#F7C9D6",
					300: "#F3A6BA",
					400: "#EE829E",
					500: "#E95E83",
					600: "#E33A67",
					700: "#D71E4F",
					800: "#B31942",
					900: "#821230",
					950: "#690F27",
				},
				ogblue: {
					DEFAULT: "#0A3161",
					50: "#CCE1FA",
					100: "#BAD5F8",
					200: "#95BFF4",
					300: "#70A9F0",
					400: "#4B93EC",
					500: "#267DE9",
					600: "#1569D0",
					700: "#1256AB",
					800: "#0E4486",
					900: "#0A3161",
					950: "#072448",
				},
			},
			fontFamily: {
				sans: ["Open Sans", ...defaultTheme.fontFamily.sans],
				serif: ["Roboto Slab", ...defaultTheme.fontFamily.serif],
			},
			fontSize: {
				xxs: ["0.625rem", { lineHeight: "1rem" }],
			},
		},
	},

    plugins: [forms, typography,require('flowbite/plugin'),require('tailwind-scrollbar'),require('tailwind-scrollbar-hide')],
};
