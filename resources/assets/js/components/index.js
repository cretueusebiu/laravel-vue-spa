import Vue from 'vue'
import { HasError, AlertError, AlertSuccess } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertSuccess.name, AlertSuccess)

const registerComponent = c => {
  if (c.default) {
    c = c.default
  }

  if (c.name !== undefined) {
    Vue.component(c.name, c)
  }
}

// Load global components dynamically
let requireContext = require.context('./global', false, /.*\.(js|vue)$/)
requireContext.keys().forEach(file => registerComponent(requireContext(file)))

// Load layout components dynamically
requireContext = require.context('./layouts', false, /.*\.(js|vue)$/)
requireContext.keys().forEach(file => registerComponent(requireContext(file)))
