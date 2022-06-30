import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import confirm from '~/plugins/swal'
import vuetify from '~/plugins/vuetify'
import axios from 'axios'

import '~/plugins'
import '~/components'

Vue.config.productionTip = false

Vue.prototype.$settings = window.settings
Vue.prototype.$confirm = confirm
Vue.prototype.$http = axios
Vue.filter('currency', (value) => {
  if (typeof value !== 'number') {
    return value
  }
  const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: window.settings.currency_code,
    currencyDisplay: 'narrowSymbol',
    minimumFractionDigits: 2
  })
  return formatter.format(value)
})
Vue.filter('shownumber', (value) => {
  if (typeof value !== 'number') {
    return value
  }
  const formatter = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 2
  })
  return formatter.format(value)
})

/* eslint-disable no-new */
new Vue({
  vuetify,
  i18n,
  store,
  router,
  ...App
})
