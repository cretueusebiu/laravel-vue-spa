import Vue from 'vue'
import Meta from 'vue-meta'
import Router from 'vue-router'
import './utils/interceptors'
import { HasError4, AlertError, AlertSuccess } from 'vform'

Vue.use(Router)
Vue.use(Meta)

// Register components
Vue.component('has-error', HasError4)
Vue.component('alert-error', AlertError)
Vue.component('alert-success', AlertSuccess)
Vue.component('icon', require('./components/icon.vue'))
Vue.component('Child', require('./components/Child.vue'))
