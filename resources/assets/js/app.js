import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import App from '~/components/App'
import { i18n } from '~/plugins/i18n'

import '~/plugins'
import '~/components'

Vue.config.productionTip = false

new Vue({
  i18n,
  store,
  router,
  ...App
})
