<template>
  <div id="app">
    <Loading ref="loading"></Loading>

    <transition name="page" mode="out-in">
      <component v-if="layout" :is="layout"></component>
    </transition>
  </div>
</template>

<script>
const layouts = {
  _app: require('../layouts/app.vue'),
  _default: require('../layouts/default.vue')
}

export default {
  name: 'App',

  components: {
    Loading: require('./Loading.vue')
  },

  metaInfo: {
    title: 'Laravel'
  },

  data: () => ({
    layout: null,
    defaultLayout: 'app'
  }),

  created () {
    this.$root.$loading = this
  },

  mounted () {
    this.$loading = this.$refs.loading
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout (layout) {
      if (!layout || !layouts['_' + layout]) {
        layout = this.defaultLayout
      }

      this.layout = layouts['_' + layout]
    }
  }
}
</script>

<style lang="scss">
@import '../../scss/main';
</style>
