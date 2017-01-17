<template>
  <div id="app">
    <ProgressBar ref="loading"></ProgressBar>

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

import ProgressBar from './ProgressBar.vue'

export default {
  name: 'App',

  components: { ProgressBar },

  metaInfo: {
    title: 'Laravel'
  },

  data: () => ({
    layout: null,
    layoutName: '',
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

      this.layoutName = layout

      const _layout = '_' + layout

      this.layout = layouts[_layout]
    }
  }
}
</script>

<style lang="scss">
@import '../../scss/main';
</style>
