<template>
  <div>
    <div class="top-right links">
      <template v-if="authenticated">
        <router-link :to="{ name: 'home' }">Home</router-link>
      </template>
      <template v-else>
        <router-link :to="{ name: 'auth.login' }">Login</router-link>
        <router-link :to="{ name: 'auth.register' }">Register</router-link>
      </template>
    </div>

    <div class="text-center">
      <div class="title mb-4">
        {{ title }}
      </div>

      <div class="links">
        <a href="https://laravel.com/docs">Documentation</a>
        <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://github.com/laravel/laravel">GitHub</a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'welcome',

  layout: 'default',

  metaInfo: { titleTemplate: 'Welcome | %s' },

  computed: mapGetters({
    authenticated: 'authCheck'
  }),

  data: () => ({
    title: 'Laravel'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
