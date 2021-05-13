const mix = require('laravel-mix')
const webpackConfig = require('./webpack.config')
require('laravel-mix-merge-manifest')

mix
  .js('resources/js/app.js', 'public/dist/js')
  .webpackConfig(webpackConfig)
  .extract()
  .disableNotifications()
  .mergeManifest()

mix.inProduction() ? mix.version() : mix.sourceMaps()
