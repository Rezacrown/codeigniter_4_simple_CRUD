/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // "./resources/**/*.blade.php",
    "./app/Views/*.php",
    "./app/Views/**/*.php",
    "./app/Views/**/**/*.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],

  daisyui: {
    themes: ["light", "dark", "lofi"],
  },
};
