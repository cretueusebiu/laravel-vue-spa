<template>
  <div class="welcome">
    <div class="flex-center position-ref full-height">
      <div class="top-right links">
        <template v-if="authenticated">
          <router-link :to="{ name: 'home' }">Home</router-link>
        </template>
        <template v-else>
          <router-link :to="{ name: 'auth.login' }">Login</router-link>
          <router-link :to="{ name: 'auth.register' }">Register</router-link>
        </template>
      </div>

      <div class="content">
        <div class="title m-b-md">
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
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'welcome',

  layout: 'default',

  metaInfo: {
    titleTemplate: 'Welcome | %s'
  },

  computed: mapGetters({
    authenticated: 'authCheck'
  }),

  data: () => ({
    title: 'Laravel'
  })
}
</script>

<style scoped>
.welcome {
  background-color: #fff;
  color: #636b6f;
  font-weight: 100;
  height: 100vh;
  margin: 0;
}

.full-height {
  height: 100vh;
}

.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}

.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.content {
  text-align: center;
}

.title {
  font-size: 84px;
}

.links > a {
  color: #636b6f;
  padding: 0 25px;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: .1rem;
  text-decoration: none;
  text-transform: uppercase;
}

.m-b-md {
  margin-bottom: 30px;
}
</style>
