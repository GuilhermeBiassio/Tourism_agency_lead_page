/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.{html,js,php}",
      "./node_modules/tw-elements/dist/js/**/*.js"
    ],
    theme: {
      extend: {
        fontFamily:{
          custom : [
            'Roboto', 'sans-serif'
          ]
        }
      },
      screens: {
        'sml' : '710px',
        'sm': '950px',
        'md': '1024px',
        'xl': '1200px',
        'lg': '1340px'
      }
    },
    plugins: [require("tw-elements/dist/plugin.cjs")],
  }