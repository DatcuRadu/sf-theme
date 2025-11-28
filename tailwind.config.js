/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.{html,js}',
    "./*.php",
    "./**/*.php",
    "./src/**/*.js",
    "./src/**/*.html"
  ],
  theme: {
    extend: {
      screens: {
        'tablet': '900px',
      },
      fontSize: {
        'xxs': '10px',
        15: ['15px', {
          lineHeight: '1',
        }],
      },
      maxWidth: {
        '3xl': '1600px',
        '8xl': '1600px',
      },
      fontFamily: {
        'hwt': 'hwt-slab-antique, sans-serif',
        'acumin': 'acumin-pro, Sans-serif',
        'acumin-wide': 'acumin-pro-wide, Sans-serif',
        'acumin-pro-condensed': 'acumin-pro-condensed, Sans-serif',
      },
      
      colors: {
        headline: '#26292B',
        customDark: '#0F0E0E',
        grey: {
          DEFAULT: '#7a7a7a',
          darker: '#111111',
          headline: '#54595f',
          fa: '#FAFAFA',
          ead: '#AEADAD',
          200: '#ebebeb',
          300: '#F0F0F0',
          400: '#BFB9B9',
          450: '#e2e2e2',
          500: '#474040',
          600: '#666666',
          700: '#3a3a3a',
          800: '#777777',
          900: '#101010'
        },
        blue:{
          DEFAULT: '#0274be',
        },
        orange: {
          DEFAULT: '#f95b0a',
          highlight: '#F98D0A',
          100: '#F9990A',
          200: '#ED9E1B',
          300: '#E8632B',
          400: '#E4550C',
          500: '#FD5906',
        }
      },
      boxShadow: {
        'sm': '0 0 20px rgba(0,0,0,.2)',
      },
    },
  },
  plugins: [],
}

