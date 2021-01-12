import axios from 'axios'
import * as types from '../mutation-types'

// state
export const state = {
  user: window.config.data.user
}

// getters
export const getters = {
  user: state => state.user,
  check: state => state.user !== null
}

// mutations
export const mutations = {
  [types.FETCH_USER_SUCCESS] (state, { user }) {
    state.user = user
  },

  [types.LOGOUT] (state) {
    state.user = null
  },

  [types.UPDATE_USER] (state, { user }) {
    state.user = user
  }
}

// actions
export const actions = {
  async fetchUser ({ commit }) {
    try {
      const { data } = await axios.get('/api/user')

      commit(types.FETCH_USER_SUCCESS, { user: data })
    } catch (e) { }
  },

  updateUser ({ commit }, payload) {
    commit(types.UPDATE_USER, payload)
  },

  async logout ({ commit }) {
    try {
      await axios.post('/logout')
    } catch (e) { }

    commit(types.LOGOUT)
  }
}
