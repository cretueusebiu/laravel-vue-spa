import Vue from 'vue'
import './bootstrap'
import { sync } from 'vuex-router-sync'

import store from './store'
import routes from './routes'
import makeRouter from './utils/router'
import App from './components/App.vue'

const router = makeRouter(routes)

sync(store, router)

new Vue({
  store,
  router,
  ...App,
  el: '#app'
})
