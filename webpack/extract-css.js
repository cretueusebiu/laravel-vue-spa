const mix = require('laravel-mix')
const webpackConfig = require('./webpack.config')
require('laravel-mix-merge-manifest')

mix
  .sass('resources/sass/app.scss', 'public/dist/css')
  .webpackConfig(webpackConfig)
  .mergeManifest()
mix.inProduction() ? mix.version() : mix.sourceMaps()
