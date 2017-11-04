export default ({ authGuard, guestGuard }) => [
  { path: '/', name: 'welcome', component: require('~/pages/welcome.vue') },

  // Authenticated routes.
  ...authGuard([
    { path: '/home', name: 'home', component: require('~/pages/home.vue') },
    { path: '/settings', component: require('~/pages/settings/index.vue'), children: [
      { path: '', redirect: { name: 'settings.profile' }},
      { path: 'profile', name: 'settings.profile', component: require('~/pages/settings/profile.vue') },
      { path: 'password', name: 'settings.password', component: require('~/pages/settings/password.vue') },
    ] },

    { path: '/users', name: 'users.index', component: require('~/pages/users/index.vue') },
    { path: '/users/:id', name: 'users.show', component: require('~/pages/users/show.vue') },
    { path: '/users/create', name: 'users.create', component: require('~/pages/users/create.vue') },
    { path: '/users/:id/edit', name: 'users.edit', component: require('~/pages/users/edit.vue') },
  ]),

  // Guest routes.
  ...guestGuard([
    { path: '/login', name: 'login', component: require('~/pages/auth/login.vue') },
    { path: '/register', name: 'register', component: require('~/pages/auth/register.vue') },
    { path: '/password/reset', name: 'password.request', component: require('~/pages/auth/password/email.vue') },
    { path: '/password/reset/:token', name: 'password.reset', component: require('~/pages/auth/password/reset.vue') }
  ]),

  { path: '*', name: 'not-found', component: require('~/pages/errors/404.vue') }
]
