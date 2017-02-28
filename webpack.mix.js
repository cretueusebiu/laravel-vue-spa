const { mix } = require('laravel-mix')

mix.js('resources/assets/js/app.js', 'public/js')
mix.sass('resources/assets/sass/app.scss', 'public/css')

mix.sourceMaps()
mix.disableNotifications()

if (mix.config.inProduction) {
  mix.version()
}
