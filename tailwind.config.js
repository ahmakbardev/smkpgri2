/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            padding: {
                "custom-mobile": "1rem", // Padding for mobile devices
                "custom-tablet": "2rem", // Padding for tablets
                "custom-desktop": "4rem", // Padding for desktops
                "custom-large": "6rem", // Padding for large desktops
            },
            fontFamily: {
                jakarta: ['"Plus Jakarta Sans"', "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [
        function ({ addComponents }) {
            addComponents({
                ".container-responsive": {
                    paddingInline: "1rem", // Default padding for mobile
                    "@screen md": {
                        paddingInline: "2rem", // Padding for tablets
                    },
                    "@screen lg": {
                        paddingInline: "4rem", // Padding for desktops
                    },
                    "@screen xl": {
                        paddingInline: "6rem", // Padding for large desktops
                    },
                },
            });
        },
    ],
};
