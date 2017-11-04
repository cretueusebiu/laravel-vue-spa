import axios from 'axios'
import * as types from '../mutation-types'

const url = '/api/users';

export const namespaced = true

// state
export const state = {
  users: null,
  user: null
}

// mutations
export const mutations = {
  // index
  [types.FETCH_USERS_SUCCESS] (state, { users }) {
    state.users = users
  },
  [types.FETCH_USERS_FAILURE] (state) {
    state.users = null
  },
  [types.FETCH_USER_SUCCESS] (state, { user }) {
    state.user = user
  },
  [types.FETCH_USER_FAILURE] (state) {
    state.user = null
  },
}

// actions
export const actions = {
  async index ({ commit }) {
    try {
      const { data } = await axios.get(url)

      commit(types.FETCH_USERS_SUCCESS, { users: data })
    } catch (e) {
      commit(types.FETCH_USERS_FAILURE)
    }
  },

  async show ({ commit }, id) {
    try {
      const { data } = await axios.get(url + '/' + id)

      commit(types.FETCH_USER_SUCCESS, { user: data })
    } catch (e) {
      commit(types.FETCH_USER_FAILURE)
    }
  },

  async create ({ commit }, id) {
    try {
      //const { data } = await axios.get(url + '/create')

      commit(types.CREATE_USER_SUCCESS, { user: data })
    } catch (e) {
      commit(types.CREATE_USER_FAILURE)
    }
  },
}

// getters
export const getters = {
  getUsers: state => state.users,
  getUser: state => state.user
}
