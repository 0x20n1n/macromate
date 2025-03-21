/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        // Define custom colors that can be used in both modes
        primary: {
          DEFAULT: '#6366f1', // indigo-600
          dark: '#818cf8',    // indigo-400
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
} 