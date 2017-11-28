import axios from 'axios'
import store from '~/store'
import router from '~/router'
import swal from 'sweetalert2'

axios.interceptors.request.use(request => {
  if (store.getters['auth/authToken']) {
    request.headers.common['Authorization'] = `Bearer ${store.getters['auth/authToken']}`
  }

  // request.headers['X-Socket-Id'] = Echo.socketId()

  return request
})

axios.interceptors.response.use(response => response, error => {
  const { status } = error.response

  if (status >= 500) {
    swal({
      type: 'error',
      title: swal.i18n.t('error_alert_title'),
      text: swal.i18n.t('error_alert_text')
    })
  }

  if (status === 401 && store.getters['auth/authToken']) {
    swal({
      type: 'warning',
      title: swal.i18n.t('token_expired_alert_title'),
      text: swal.i18n.t('token_expired_alert_text')
    })
    .then(async () => {
      await store.dispatch('logout')

      router.push({ name: 'login' })
    })
  }

  if (status === 404) {
      router.push({ name: 'not-found' })
  }

  return Promise.reject(error)
})
