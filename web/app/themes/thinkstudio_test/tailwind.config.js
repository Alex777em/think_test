/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      fontFamily: {
        montserrat: ['Montserrat', 'sans-serif'],
      },
      colors: {
          primary: '#201E50',
          secondary: '#BA2C73',
      },
      container: {
        center: true,
        padding: '1rem',
        screens: {
          xl: '1200px',
        },
      },
      fontSize: {
        base: '15px',
      },
      fontWeight: {
        base: '500',
      },
    },
  },
  plugins: [],
};

export default config;
