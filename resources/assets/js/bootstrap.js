import Vue from 'vue'
import $ from 'jquery'
import Tether from 'tether'
import Meta from 'vue-meta'
import Router from 'vue-router'

import './components'
import './utils/interceptors'

Vue.config.productionTip = false

Vue.use(Router)
Vue.use(Meta)

window.jQuery = $
window.Tether = Tether
require('bootstrap')
