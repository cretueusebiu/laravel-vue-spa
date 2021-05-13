const path = require('path')
const appRoot = require('../root')
const ChunkRenamePlugin = require('webpack-chunk-rename-plugin')
const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

const report = process.argv.includes('--report')
const hmr = process.argv.includes('--hot')

module.exports = {
  plugins: [
    new ChunkRenamePlugin({
      initialChunksWithEntry: true,
      '/dist/js/app': 'dist/js/app.js',
      '/dist/js/vendor': 'dist/js/vendor.js'
    }),
    ...(report ? [new BundleAnalyzerPlugin({ openAnalyzer: true })] : [])
  ],
  resolve: {
    extensions: ['.js', '.json', '.vue'],
    alias: {
      '~': path.join(appRoot, './resources/js')
    }
  },
  devServer: {
    proxy: {
      '*': 'http://localhost:8000'
    }
  },
  output: {
    chunkFilename: 'dist/js/chunks/[chunkhash:6].chunk.js',
    path: hmr ? '/' : path.resolve(appRoot, './public')
  }
}
