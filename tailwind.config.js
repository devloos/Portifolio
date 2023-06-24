/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: 'class',
  theme: {
    container: {
      center: true,
    },
    extend: {
      colors: {
        primary: '#1e293b',
        'primary-light': '#626976',
        'primary-dark': '#151d29',
        alternate: '#4383cb',
        'alternate-light': '#7ba8db',
        'alternate-dark': '#2f5c8e',
        coal: '#333',
      },
    },
  },
  plugins: [],
};
