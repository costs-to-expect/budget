/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./app/View/Components/Content/Landing/*.php",
        "./app/View/Components/Helper/Control/Link/*.php",
        "./app/View/Components/Layout/*.php",
        "./resources/views/authentication/*.blade.php",
        "./resources/views/components/helper/**/*.blade.php",
        "./resources/views/components/layout/**/*.blade.php",
        "./resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                mini: ['0.675rem', '0.825rem'],
            },
            colors: {
                pinky: {
                    50: '#D644D1',
                    100: '#C739C2',
                    200: '#B82FB3',
                    300: '#A826A4',
                    400: '#991E95',
                    500: '#8A1786',
                    600: '#7A1177',
                    700: '#6B0B68',
                    800: '#5C0759',
                    900: '#4D044B',
                },
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
}
