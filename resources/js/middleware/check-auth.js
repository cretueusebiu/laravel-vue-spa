import store from '~/store'

export default async (to, from, next) => {
  if (!store.getters['auth/check'] && store.getters['auth/token']) {
    try {
      await store.dispatch('auth/fetchUser', { baseUrl: store.getters['core/baseUrl'] })
    } catch (e) { }
  }

  next()
}
