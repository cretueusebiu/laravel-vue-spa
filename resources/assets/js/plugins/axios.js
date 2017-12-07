import axios from 'axios'
import store from '~/store'
import router from '~/router'
import swal from 'sweetalert2'

axios.interceptors.request.use(request => {
  const token = store.getters['auth/token']

  if (token) {
    request.headers.common['Authorization'] = `Bearer ${token}`
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

  if (status === 401 && store.getters['auth/check']) {
    swal({
      type: 'warning',
      title: swal.i18n.t('token_expired_alert_title'),
      text: swal.i18n.t('token_expired_alert_text')
    })
    .then(async () => {
      await store.dispatch('auth/logout')

      router.push({ name: 'login' })
    })
  }

  return Promise.reject(error)
})
