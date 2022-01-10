// state
export const state = {
  snackbarText: ''
}

// getters
export const getters = {
  snackbarText: state => state.snackbarText
}

// mutations
export const mutations = {
  'SHOW_MESSAGE' (state, snackbarText) {
    state.snackbarText = snackbarText
    setTimeout(function () {
      state.snackbarText = ''
    }, 3000)
  },
  'HIDE_MESSAGE' (state) {
    state.snackbarText = ''
  }
}

// actions
export const actions = {
  showMessage ({ commit }, snackbarText) {
    commit('SHOW_MESSAGE', snackbarText)
  },
  hideMessage ({ commit }) {
    commit('HIDE_MESSAGE')
  }
}
