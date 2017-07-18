const path = require('path')
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
  ],
  resolve: {
    alias: {
      'src': path.join(__dirname, './resources/assets/js'),
      '~utils': path.join(__dirname, './resources/assets/js/utils'),
      '~plugins': path.join(__dirname, './resources/assets/js/plugins'),
      '~services': path.join(__dirname, './resources/assets/js/services'),
      '~components': path.join(__dirname, './resources/assets/js/components')
    }
  }
})
