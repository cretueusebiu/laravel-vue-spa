import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const modules = {}
const requireContext = require.context('./modules', false, /.*\.js$/)

requireContext.keys().forEach(file => {
  const name = file.replace(/(^.\/)|(\.js$)/g, '')

  modules[name] = requireContext(file).default
})

export default new Vuex.Store({ modules })
