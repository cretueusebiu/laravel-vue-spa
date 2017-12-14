import Vue from 'vue'
import axios from 'axios'
import store from '~/store'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n)

const { locale, translations } = window.config

export const i18n = new VueI18n({
  locale,
  messages: {
    [locale]: translations
  }
})

/**
 * @param {String} locale
 */
export async function setLocale (locale) {
  await loadTranslations(locale)

  if (i18n.locale !== locale) {
    i18n.locale = locale
    store.dispatch('lang/setLocale', { locale })
    document.querySelector('html').setAttribute('lang', locale)
  }
}

/**
 * @param {String} locale
 */
async function loadTranslations (locale) {
  if (Object.keys(i18n.getLocaleMessage(locale)).length === 0) {
    const { data } = await axios.get(`/api/translations/${locale}`)

    i18n.setLocaleMessage(locale, data)
  }
}
