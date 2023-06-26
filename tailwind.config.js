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
        primary: {
          100: '#d2d4d8',
          200: '#a5a9b1',
          300: '#787f89',
          400: '#4b5462',
          500: '#1e293b',
          600: '#18212f',
          700: '#121923',
          800: '#0c1018',
          900: '#06080c',
        },
        alternate: {
          100: '#d9e6f5',
          200: '#b4cdea',
          300: '#8eb5e0',
          400: '#699cd5',
          500: '#4383cb',
          600: '#3669a2',
          700: '#284f7a',
          800: '#1b3451',
          900: '#0d1a29',
        },
        coal: {
          100: '#d6d6d6',
          200: '#adadad',
          300: '#858585',
          400: '#5c5c5c',
          500: '#333333',
          600: '#292929',
          700: '#1f1f1f',
          800: '#141414',
          900: '#0a0a0a',
        },
      },
    },
  },
  plugins: [],
};
