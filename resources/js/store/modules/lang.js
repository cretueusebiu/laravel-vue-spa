import Cookies from 'js-cookie'
import * as types from '../mutation-types'

const { locale, locales } = window.config

function validateCookieLocale () {
  const cookieLocale = Cookies.get('locale') || locale
  if (locales.hasOwnProperty(cookieLocale)) {
    return cookieLocale
  } else {
    Cookies.set('locale', locale, { expires: 365 })
    return locale
  }
}

// state
export const state = {
  locale: validateCookieLocale(),
  locales: locales
}

// getters
export const getters = {
  locale: state => state.locale,
  locales: state => state.locales
}

// mutations
export const mutations = {
  [types.SET_LOCALE] (state, { locale }) {
    state.locale = locale
  }
}

// actions
export const actions = {
  setLocale ({ commit }, { locale }) {
    commit(types.SET_LOCALE, { locale })

    Cookies.set('locale', locale, { expires: 365 })
  }
}
