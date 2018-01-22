import Vue from 'vue'
import { HasError, AlertError, AlertSuccess } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertSuccess.name, AlertSuccess)

/**
 * @param {Object} requireContext
 */
const registerComponents = requireContext => {
  requireContext.keys().forEach(file => {
    let component = requireContext(file)

    if (component.default) {
      component = component.default
    }

    if (component.name !== undefined) {
      Vue.component(component.name, component)
    }
  })
}

// Load global components dynamically
registerComponents(require.context('./global', false, /.*\.(js|vue)$/))

// Load layout components dynamically
registerComponents(require.context('./layouts', false, /.*\.(js|vue)$/))
