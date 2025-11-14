const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './src/index.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'dist'),
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i, // Suport pentru .scss și .sass
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader', // Adaugă loader-ul pentru Sass
        ],
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader'], // Înlocuiește 'style-loader' cu MiniCssExtractPlugin.loader
      },
      {
        test: /\.(woff(2)?|eot|ttf|otf|svg)$/, // Pentru a suporta fișierele font FontAwesome
        type: 'asset/resource',
        generator: {
          filename: 'fonts/[name][ext]',
        },
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'styles.css', // CSS-ul va fi generat în acest fișier
    }),
  ],
  mode: 'development',
};
