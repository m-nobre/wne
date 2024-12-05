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
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'sunset': "url('/storage/images/fundo.png')",
              }
        },
        screens: {
            'xs': '320px',
            // => @media (min-width: 640px) { ... }
            'mobile-small': '320px',
            // => @media (min-width: 640px) { ... }
            'mobile-medium': '375px',
            // => @media (min-width: 640px) { ... }
            'mobile-large': '425px',
            // => @media (min-width: 640px) { ... }
            'tablet-small': '640px',
            // => @media (min-width: 640px) { ... }
      
            'tablet': '768px',
            // => @media (min-width: 640px) { ... }

            'laptop': '1024px',
            // => @media (min-width: 1024px) { ... }
      
            'laptop-large': '1440px',
            // => @media (min-width: 1280px) { ... }
            
            'desktop': '2560px',
            // => @media (min-width: 1280px) { ... }
          },
    },

    plugins: [forms, typography],
};
