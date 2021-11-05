<template>
  <v-card
    class="mx-auto center-box"
    max-width="344"
    outlined
  >
    <v-card-title>
      <v-icon
        large
        left
      >
        mdi-twitter
      </v-icon>
      <span class="text-h6 font-weight-light">{{ $t('home') }}</span>
    </v-card-title>
    <v-card-text class="text-h5 font-weight-bold">
      {{ $t('you_are_logged_in') }}
    </v-card-text>
  </v-card>
</template>

<script>
// import axios from 'axios'
export default {
  middleware: 'auth',

  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>

<style scoped>
.center-box{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
