module.exports = {
  content: ["./src/views/**/*.php",
            "./public/assets/index.php"], // Указываем маску для файлов, которые используют стили
  darkMode: false, // или 'media' или 'class'
  theme: {
    extend: {
      // Здесь вы можете добавить свои дополнительные стили
    },
  },
  variants: {
    extend: {
      // Здесь вы можете расширить варианты (классы) Tailwind
    },
  },
  plugins: [
    // Здесь вы можете подключить дополнительные плагины
  ],
}


// npx tailwindcss -i ./src/css/input.css -o ./public/assets/css/output.css --watch