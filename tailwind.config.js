///** @type {import('tailwindcss').Config} */
//module.exports = {
//  content: [
//    './resources/**/*.blade.php',
//    './resources/**/*.js',
//    './resources/**/*.vue',
//    './*.html',
//  ],
//  theme: {
//    extend: {},
//  },
//  plugins: [],
//};

const mix = require('laravel-mix');

/*
 | El compilador tomará tu CSS con Tailwind y lo mandará optimizado a public/css
 */
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ]);