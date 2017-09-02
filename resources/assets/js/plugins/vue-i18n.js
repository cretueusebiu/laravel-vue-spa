import Vue from 'vue'
import VueI18n from 'vue-i18n'
import swal from 'sweetalert2'

Vue.use(VueI18n)

const { locale, translations } = window.config

const i18n = new VueI18n({
  locale,
  messages: {
    [locale]: translations
  }
})

swal.i18n = i18n
swal.setDefaults({
  reverseButtons: true,
  confirmButtonText: i18n.t('ok'),
  cancelButtonText: i18n.t('cancel')
})

export default i18n
