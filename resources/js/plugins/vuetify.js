import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

const opts = {
  theme: {
    themes: {
      light: {
        primary: '#3f51b5',
        secondary: '#696969',
        accent: '#8c9eff',
        error: '#b71c1c'
      }
    }
  }
}

export default new Vuetify({})
