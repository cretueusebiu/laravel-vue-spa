<template>
  <div class="home">
    <div class="top-right links">
      <template v-if="authenticated">
        <v-btn :to="{ name: 'home' }" text>
          {{ $t('home') }}
        </v-btn>
      </template>
      <template v-else>
        <v-btn :to="{ name: 'login' }" text>
          {{ $t('login') }}
        </v-btn>
        <v-btn :to="{ name: 'register' }" text>
          {{ $t('register') }}
        </v-btn>
      </template>
    </div>

    <div class="text-h1">
      {{ title }}
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  layout: 'basic',

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
}
</script>

<style scoped>
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.home{
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
