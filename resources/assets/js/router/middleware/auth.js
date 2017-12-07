import store from '~/store'

export default async (to, from, next) => {
  if (!store.getters.authCheck) {
    next({ name: 'login' })
  } else {
    next()
  }
}
