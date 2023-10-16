// webpack.mix.js

let mix = require("laravel-mix");

// mix.js("src/app.js", "dist").setPublicPath("dist");
mix
  .js("tailwind/app.js", "public/dist")
  .postCss("tailwind/app.css", "public/dist", [require("tailwindcss")]);
