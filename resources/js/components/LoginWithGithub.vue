<template>
  <button v-if="githubAuth" class="btn btn-dark ml-auto" type="button" @click="login">
    {{ $t('login_with') }}
    <fa :icon="['fab', 'github']" />
  </button>
</template>

<script>
import Swal from 'sweetalert2'
import i18n from '~/plugins/i18n'

export default {
  name: 'LoginWithGithub',

  computed: {
    githubAuth: () => window.config.githubAuth
  },

  mounted () {
    window.addEventListener('message', this.onMessage, false)
  },

  beforeDestroy () {
    window.removeEventListener('message', this.onMessage)
  },

  methods: {
    async login () {
      openWindow('/oauth/github', this.$t('login'))
    },

    /**
     * @param {MessageEvent} e
     */
    async onMessage (e) {
      if (e.origin !== window.origin) {
        return
      }

      if (e.data.success) {
        await this.$store.dispatch('auth/fetchUser')

        this.$router.push({ name: 'home' })
      } else if (e.data.error) {
        Swal.fire({
          icon: 'error',
          title: i18n.t('error_alert_title'),
          text: e.data.error,
          reverseButtons: true,
          confirmButtonText: i18n.t('ok')
        })
      }
    }
  }
}

/**
 * @param  {Object} options
 * @return {Window}
 */
function openWindow (url, title, options = {}) {
  if (typeof url === 'object') {
    options = url
    url = ''
  }

  options = { url, title, width: 600, height: 720, ...options }

  const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screen.left
  const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screen.top
  const width = window.innerWidth || document.documentElement.clientWidth || window.screen.width
  const height = window.innerHeight || document.documentElement.clientHeight || window.screen.height

  options.left = ((width / 2) - (options.width / 2)) + dualScreenLeft
  options.top = ((height / 2) - (options.height / 2)) + dualScreenTop

  const optionsStr = Object.keys(options).reduce((acc, key) => {
    acc.push(`${key}=${options[key]}`)
    return acc
  }, []).join(',')

  const newWindow = window.open(url, title, optionsStr)

  if (window.focus) {
    newWindow.focus()
  }

  return newWindow
}
</script>
