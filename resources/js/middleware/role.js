import store from '~/store'
import Cookies from 'js-cookie'

/**
 * This is middleware to check the current user role.
 *
 * middleware: 'role:admin,manager',
 */

export default (to, from, next, roles) => {
  if (!store.getters['auth/check']) {
    Cookies.set('intended_url', to.path)

    next({ name: 'login' })
    return
  }
  // Grab the user
  const user = store.getters['auth/user']

  // Split roles into an array
  roles = roles.split(',')

  // Check if the user has one of the required roles...
  if (!roles.includes(user.role)) {
    next('/unauthorized')
  }

  next()
}
