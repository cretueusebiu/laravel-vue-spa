import store from '~/store'
import Cookies from 'js-cookie'

export default (to, from, next) => {
  if (!store.getters['auth/check']) {
    Cookies.set('intended_url', to.path)

    next({ name: 'login' })
    return
  }
  if (store.getters['auth/user'].role !== 'admin') {
    next({ name: 'home' })
  } else {
    next()
  }
}
