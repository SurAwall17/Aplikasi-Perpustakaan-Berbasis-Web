/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
    fontFamily: {
      sans: ["Montserrat", "sans-serif"],
    },
    colors: {
      primary: {
        light: "#47aff5",
        DEFAULT: "#3498db",
        dark: "#2980b9",
      },
    }
  },
  plugins: [],
}}

