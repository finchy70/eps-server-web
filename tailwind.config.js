const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
    theme: {},
    variants: {},
    plugins: [
        require('@tailwindcss/forms'),
    ],

}
