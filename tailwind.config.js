/** @type {import('tailwindcss').Config} */
export default  {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        graay : '#1F2937',
        jaune: '#ffb800'
      }
    },
  },
  plugins: [
 
  ],
}

