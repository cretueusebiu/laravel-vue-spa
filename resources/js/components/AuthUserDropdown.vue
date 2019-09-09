<template>
  <ul class="navbar-nav ml-auto">
    <!-- Authenticated -->
    <li v-if="user" class="nav-item dropdown">
      <a v-on-clickaway="away"
         class="nav-link dropdown-toggle text-dark"
         @click.prevent="show = !show"
      >
        <img :src="user.photo_url" class="rounded-circle profile-photo mr-1" alt="">
        {{ user.name }}
      </a>
      <div v-show="show" class="dropdown-menu">
        <router-link class="dropdown-item pl-3" :to="{ name: 'settings.profile' }" @click.native="show = false">
          <fa icon="cog" fixed-width />
          {{ $t('settings') }}
        </router-link>

        <div class="dropdown-divider" />
        <a href="#" class="dropdown-item pl-3" @click.prevent="logout">
          <fa icon="sign-out-alt" fixed-width />
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
        <router-link class="nav-link" :to="{ name: 'register' }" active-class="active" @click.native="show = false">
          {{ $t('register') }}
        </router-link>
      </li>
    </template>
  </ul>
</template>

<style scoped>
  .dropdown-menu {
    display: unset;
  }

  .profile-photo {
    width: 2rem;
    height: 2rem;
    margin: -.375rem 0;
  }
</style>

<script>
import { mixin as clickaway } from 'vue-clickaway'

export default {
  mixins: [clickaway],
  props: {
    user: { required: true }
  },
  data () {
    return {
      show: false
    }
  },
  methods: {
    away () {
      this.show = false
    },
    async logout () {
      this.show = false

      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>
