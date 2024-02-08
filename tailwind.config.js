/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./template-parts/*.{php,html,js}', './*.{php,html,js}'],
  theme: {
    extend: {
      colors: {
        primary: '#87c7c8',
        accent: '#676767',
        'apollo-grey': '#efefef',
        'border-grey': '#707070',
      },
    },
  },
  plugins: [],
};

