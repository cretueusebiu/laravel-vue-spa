<template>
  <div id="app">
    <loading ref="loading"></loading>

    <transition name="page" mode="out-in">
      <component v-if="layout" :is="layout"></component>
    </transition>
  </div>
</template>

<script>
const layouts = {}
const requireContext = require.context('../layouts', false, /.*\.vue$/)

requireContext.keys().forEach(file => {
  const name = file.replace(/(^.\/)|(\.vue$)/g, '')

  layouts[name] = requireContext(file)
})

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
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout
      }

      this.layout = layouts[layout]
    }
  }
}
</script>
