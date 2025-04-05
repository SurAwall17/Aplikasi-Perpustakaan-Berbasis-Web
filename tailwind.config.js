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
        light: "#3498db",
        DEFAULT: "#3498db",
        dark: "#2980b9",
      },
    }
  },
  plugins: [],
}}

