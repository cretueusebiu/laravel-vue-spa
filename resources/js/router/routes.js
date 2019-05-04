// Helper function for lazy loading routes using Webpack dynamic imports
// See: https://router.vuejs.org/guide/advanced/lazy-loading.html#grouping-components-in-the-same-chunk
// See: https://webpack.js.org/guides/code-splitting/
function page (name) {
  return () => import(
    /* webpackChunkName: 'view-' */ `~/pages/${name}.vue`
  ).then(module => module.default || module)
}

export default [
  { path: '/', name: 'welcome', component: page('welcome') },

  { path: '/login', name: 'login', component: page('auth/login') },
  { path: '/register', name: 'register', component: page('auth/register') },
  { path: '/password/reset', name: 'password.request', component: page('auth/password/email') },
  { path: '/password/reset/:token', name: 'password.reset', component: page('auth/password/reset') },

  { path: '/home', name: 'home', component: page('home') },
  { path: '/settings',
    component: page('settings/index'),
    children: [
      { path: '', redirect: { name: 'settings.profile' } },
      { path: 'profile', name: 'settings.profile', component: page('settings/profile') },
      { path: 'password', name: 'settings.password', component: page('settings/password') }
    ] },

  { path: '*', component: page('errors/404') }
]
