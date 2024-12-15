/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js,php}"],
  daisyui: {
    themes: ["light", "night", "lemonade"],
  },
  plugins: [
    require('daisyui'),
  ],
}

