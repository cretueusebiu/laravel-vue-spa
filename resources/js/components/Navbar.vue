<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="navbar-brand">
        {{ appName }}
      </router-link>

      <button class="navbar-toggler">
        <span class="navbar-toggler-icon" />
      </button>

      <div id="navbarToggler" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <locale-dropdown />
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>

        <AuthUserDropdown :user="user" />
      </div>
    </div>
  </nav>
</template>

<script>
import LocaleDropdown from './LocaleDropdown'
import AuthUserDropdown from './AuthUserDropdown'

export default {
  components: {
    AuthUserDropdown,
    LocaleDropdown
  },

  data () {
    return {
      appName: window.config.appName
    }
  },

  computed: {
    user () {
      return this.$store.getters['auth/user']
    }
  }
}
</script>

<style scoped>

</style>
