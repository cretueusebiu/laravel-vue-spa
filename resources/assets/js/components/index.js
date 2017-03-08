import Vue from 'vue'
import Icon from './Icon.vue'
import Child from './Child.vue'
import { HasError4, AlertError, AlertSuccess } from 'vform'

Vue.component(Icon.name, Icon)
Vue.component(Child.name, Child)
Vue.component(HasError4.name, HasError4)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertSuccess.name, AlertSuccess)
