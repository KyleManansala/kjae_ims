import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const plugin = require('tailwindcss/plugin');
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors :{
                'primary':{
                    100: '#32BD8F',
                    200 : '#2ECF97'
                },
                'border':{
                    100:'#F3F4F6'
                },
                'light':{
                    100:'#FFFFFF'

                },

                'sidenav' :{
                    100 : "#1F2937",
                    200 : "#F9FAFB",
                    300: "#9FA3AF"
                },

            }
           
        },
    },

    plugins: [
    forms,
        plugin(({ addVariant, e }) => {
            addVariant('sidebar-expanded', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => `.sidebar-expanded .${e(`sidebar-expanded${separator}${className}`)}`);
            });
        }),
    
    
    ],
};
