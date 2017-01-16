import Router from 'vue-router'

/**
 * Create a router instance.
 *
 * @param  {Array} routes
 * @return {Router}
 */
export default function router (routes) {
  const router = new Router({
    routes,
    scrollBehavior,
    mode: 'history'
  })

  router.beforeEach((to, from, next) => {
    const components = router.getMatchedComponents({ ...to })

    if (components.length) {
      setTimeout(() => {
        router.app.$loading.start()
        router.app.setLayout(components[0].layout || '')
      }, 0)
    }

    next()
  })

  router.afterEach((to, from) => {
    setTimeout(() => router.app.$loading.finish(), 0)
  })

  return router
}

const authenticated = false

/**
 * Add the "authenticated" guard.
 *
 * @param  {Array} routes
 * @return {Array}
 */
export function authGuard (routes) {
  return guard(routes, (to, from, next) => {
    if (authenticated) {
      next()
    } else {
      next('/login')
    }
  })
}

/**
 * Add the "guest" guard.
 *
 * @param  {Array} routes
 * @return {Array}
 */
export function guestGuard (routes) {
  return guard(routes, (to, from, next) => {
    if (authenticated) {
      next('/')
    } else {
      next()
    }
  })
}

/**
 * @param  {Array} routes
 * @param  {Function} guard
 * @return {Array}
 */
function guard (routes, guard) {
  routes.forEach(route => { route.beforeEnter = guard })

  return routes
}

/**
 * @param  {Route} to
 * @param  {Route} from
 * @param  {Object|undefined} savedPosition
 * @return {Object}
 */
function scrollBehavior (to, from, savedPosition) {
  if (savedPosition) {
    return savedPosition
  }

  const position = {}

  if (to.hash) {
    position.selector = to.hash
  }

  if (to.matched.some(m => m.meta.scrollToTop)) {
    position.x = 0
    position.y = 0
  }

  return position
}
