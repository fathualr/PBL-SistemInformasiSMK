/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                celadon: "#99E2B4",
                "vista-blue": "#88D4AB",
                "monte-carlo": "#78C6A3",
                keppel: "#67B99A",
                "dark-kepple": "#56AB91",
                "dark-lochinvar": "#469D89",
                gossamer: "#358F80",
                elm: "#248277",
                "deep-sea": "#14746F",
                "blue-lagoon": "#036666",
                "Bice-blue": "#386FA4",
                "Picton-blue": "#59A5D8",
                "Pale-zure": "#84D2F6",
                "Non-photo-blue": "#91E5F6",
                "steel-blue": "#2a4e6c",
            },
            screens: {
                smartphone: "320px",
                tablet: "640px",
                laptop: "1024px",
                desktop: "1280px",
            },
            fontFamily: {
                poppins: ["Poppins", "mono"],
            },
        },
    },
    plugins: [require("daisyui")],
};
