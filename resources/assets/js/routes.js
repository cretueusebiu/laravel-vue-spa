import { authGuard, guestGuard } from './utils/router'

export default [
  { path: '/', name: 'welcome', component: require('pages/welcome.vue') },

  ...authGuard([
    { path: '/home', name: 'home', component: require('pages/home.vue') }
  ]),

  ...guestGuard([
    { path: '/auth/login', name: 'auth.login', component: require('pages/auth/login.vue') },
    { path: '/auth/register', name: 'auth.register', component: require('pages/auth/register.vue') },
    { path: '/password/reset', name: 'password.reset', component: require('pages/password/reset.vue') }
  ])
]
