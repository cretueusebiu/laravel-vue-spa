import store from '~/store'

export default async (to, from, next) => {
  if (!store.getters['auth/check']) {
    store.dispatch('auth/setPreLoginRoute', to)
    next({ name: 'login' })
  } else {
    next()
  }
}
