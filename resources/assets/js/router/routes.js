export default ({ authGuard, guestGuard }) => [
  { path: '/', name: 'welcome', component: require('~/pages/welcome.vue') },

  // Authenticated routes.
  ...authGuard([
    { path: '/home', name: 'home', component: require('~/pages/home.vue') },
    { path: '/settings', component: require('~/pages/settings/index.vue'), children: [
      { path: '', redirect: { name: 'settings.profile' }},
      { path: 'profile', name: 'settings.profile', component: require('~/pages/settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: require('~/pages/settings/password.vue') }
    ] }
  ]),

  // Guest routes.
  ...guestGuard([
    { path: '/login', name: 'login', component: require('~/pages/auth/login.vue') },
    { path: '/register', name: 'register', component: require('~/pages/auth/register.vue') },
    { path: '/password/reset', name: 'password.request', component: require('~/pages/auth/password/email.vue') },
    { path: '/password/reset/:token', name: 'password.reset', component: require('~/pages/auth/password/reset.vue') }
  ]),

  { path: '*', component: require('~/pages/errors/404.vue') }
]
