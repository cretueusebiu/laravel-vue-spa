const path = require('path')
const webpack = require('webpack')
const mix = require('laravel-mix')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

mix
  .js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')

  .sourceMaps()
  .disableNotifications()

if (mix.inProduction()) {
  mix.version()

  mix.extract([
    'vue',
    'vform',
    'axios',
    'vuex',
    'jquery',
    'tether',
    'vue-i18n',
    'vue-meta',
    'js-cookie',
    'bootstrap',
    'vue-router',
    'sweetalert2',
    'vuex-router-sync'
  ])
}

mix.webpackConfig({
  plugins: [
    // new BundleAnalyzerPlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery',
      Popper: ['popper.js', 'default']
    })
  ],
  resolve: {
    alias: {
      '~': path.join(__dirname, './resources/assets/js')
      // '~router': path.join(__dirname, './resources/assets/js/router'),
      // '~plugins': path.join(__dirname, './resources/assets/js/plugins'),
      // '~components': path.join(__dirname, './resources/assets/js/components')
    }
  }
})
