<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
      <router-link :to="{ name: 'home' }" class="navbar-brand">
        {{ appName }}
      </router-link>

      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarToggler" aria-controls="navbarToggler"
        aria-expanded="false" :aria-label="$t('toggle_navigation')"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li> -->
        </ul>

        <ul class="navbar-nav">
          <!-- Authenticated -->
          <li v-if="user" class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark py-0"
              href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img :src="user.photo_url" class="rounded-circle profile-photo mr-1">
              {{ user.name }}
            </a>
            <div class="dropdown-menu">
              <router-link :to="{ name: 'settings.profile' }" class="dropdown-item">
                {{ $t('settings') }}
              </router-link>

              <div class="dropdown-divider"></div>
              <a @click.prevent="logout" class="dropdown-item"  href="#">
                {{ $t('logout') }}
              </a>
            </div>
          </li>
          <!-- Guest -->
          <template v-else>
            <li class="nav-item">
              <router-link :to="{ name: 'login' }" class="nav-link" active-class="active">
                {{ $t('login') }}
              </router-link>
            </li>
            <li class="nav-item">
              <router-link :to="{ name: 'register' }" class="nav-link" active-class="active">
                {{ $t('register') }}
              </router-link>
            </li>
          </template>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.navbar {
  font-weight: 600;
  border-bottom: 1px solid #dee9f2;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}

.profile-photo {
  height: 2rem;
}
</style>
