const mix = require('laravel-mix');

// Compile Tailwind CSS
mix.postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
])
.js('resources/js/app.js', 'public/js')
.version();
