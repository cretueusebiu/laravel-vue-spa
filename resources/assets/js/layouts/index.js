import Vue from 'vue'

// Load layout components dynamically.
const requireContext = require.context('./', false, /.*\.vue$/)

requireContext.keys().forEach(file => {
  let Component = requireContext(file)

  if (Component.default) {
    Component = Component.default
  }

  if (Component.name !== undefined) {
    Vue.component(Component.name, Component)
  }
})
