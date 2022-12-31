const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/js/**/*.tsx",
    ],

    // TODO: config custom font
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                sm: "0.8rem",
                base: "1rem",
                xl: "1.25rem",
                "2xl": [
                    "1.5rem",
                    {
                        lineHeight: "2rem",
                        letterSpacing: "-0.01em",
                        fontWeight: "500",
                    },
                ],
            },
            height: {
                128: "32rem",
                160: "38rem",
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
