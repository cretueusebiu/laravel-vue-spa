import api from '../../api'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// initial state
const state = {
  user: null,
  token: Cookies.get('token')
}

// mutations
const mutations = {
  [types.SAVE_TOKEN] (state, { token, remember }) {
    state.token = token
    Cookies.set('token', token, { expires: remember ? 365 : null })
  },

  [types.FETCH_USER_SUCCESS] (state, { user }) {
    state.user = user
  },

  [types.FETCH_USER_FAILURE] (state) {
    state.token = null
    Cookies.remove('token')
  },

  [types.LOGOUT] (state) {
    state.user = null
    state.token = null

    Cookies.remove('token')
  }
}

// actions
const actions = {
  saveToken ({ commit, dispatch }, payload) {
    commit(types.SAVE_TOKEN, payload)
  },

  fetchUser ({ commit }) {
    return new Promise(async (resolve, reject) => {
      const user = await api.fetchUser()

      if (user) {
        commit(types.FETCH_USER_SUCCESS, { user })
        resolve(user)
      } else {
        commit(types.FETCH_USER_FAILURE)
        reject()
      }
    })
  },

  logout ({ commit }) {
    commit(types.LOGOUT)
  }
}

// getters
const getters = {
  authUser: state => state.user,
  authToken: state => state.token,
  authCheck: state => state.user !== null
}

export default {
  state,
  mutations,
  actions,
  getters
}
