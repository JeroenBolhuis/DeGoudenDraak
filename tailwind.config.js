/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'darker-red': 'rgb(139, 0, 0)',
        'normal-red': 'rgb(255, 0, 0)',
        'yellow-500': 'rgb(255, 255, 0)',
      },
    },
  },
  plugins: [],
}

