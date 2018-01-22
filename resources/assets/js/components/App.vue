<template>
  <div id="app">
    <loading ref="loading"/>

    <transition name="page" mode="out-in">
      <router-view/>
    </transition>
  </div>
</template>

<script>
import Loading from './Loading'

export default {
  el: '#app',

  components: {
    Loading
  },

  metaInfo () {
    const { appName } = window.config

    return {
      title: appName,
      titleTemplate: `%s · ${appName}`
    }
  },

  mounted () {
    this.$loading = this.$refs.loading
  }
}
</script>
