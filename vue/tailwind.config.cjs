/** @type {import('tailwindcss').Config} */
module.exports = {
  plugins: [
    // require('@tailwindcss/forms'),
  ],
  corePlugins: {
    container: false
  },
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'mainPink': '#D993D7',
        'mainGreen': '#AAE47E'
      },
    }
  },
}