<template>
  <li class="nav-item dropdown">
    <a
      v-on-clickaway="away"
      class="nav-link dropdown-toggle"
      @click="show = !show"
    >
      {{ locales[locale] }}
    </a>
    <div v-show="show" class="dropdown-menu">
      <a v-for="(value, key) in locales"
         :key="key"
         class="dropdown-item"
         @click.prevent="setLocale(key)"
      >
        {{ value }}
      </a>
    </div>
  </li>
</template>

<style scoped>
  .dropdown-menu {
    display: unset;
  }
</style>

<script>
import { mapGetters } from 'vuex'
import { loadMessages } from '~/plugins/i18n'
import { mixin as clickaway } from 'vue-clickaway'

export default {
  mixins: [clickaway],
  data () {
    return {
      show: false
    }
  },

  computed: mapGetters({
    locale: 'lang/locale',
    locales: 'lang/locales'
  }),

  methods: {
    away () {
      this.show = false
    },
    setLocale (locale) {
      this.show = false

      if (this.$i18n.locale !== locale) {
        loadMessages(locale)

        this.$store.dispatch('lang/setLocale', { locale })
      }
    }
  }
}
</script>
