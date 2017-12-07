import store from '~/store'

export default (to, from, next) => {
  if (store.getters.authUser.role !== 'admin') {
    next({ name: 'home' })
  } else {
    next()
  }
}
