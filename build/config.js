var path = require('path')
var port = 8080

module.exports = {
  build: {
    env: {
      NODE_ENV: '"production"'
    },
    assetsRoot: path.resolve(__dirname, '../public'),
    assetsSubDirectory: 'build',
    assetsPublicPath: '/',
    productionSourceMap: false,
    // Gzip off by default as many popular static hosts such as
    // Surge or Netlify already gzip all static assets for you.
    // Before setting to `true`, make sure to:
    // npm install --save-dev compression-webpack-plugin
    productionGzip: false,
    productionGzipExtensions: ['js', 'css']
  },
  dev: {
    env: {
      NODE_ENV: '"development"'
    },
    port: port,
    assetsSubDirectory: 'public',
    assetsPublicPath: 'http://localhost:' + port + '/',
    proxyTable: {},
    cssSourceMap: true
  }
}
