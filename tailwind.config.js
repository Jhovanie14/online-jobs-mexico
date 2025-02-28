import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
           colors: {
            green: {
                light: '#009847',
                DEFAULT: '#006847',
                dark: '#047857',
            },
            red: {
                light: '#ff4640',
                DEFAULT: '#CF1024',
                dark: '#FF0000',
            },
           }
        },
    },
    plugins: [],
};
