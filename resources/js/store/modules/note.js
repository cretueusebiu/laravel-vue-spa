import axios from "axios";
import Vue from "vue";
import moment from "moment";
export const state = {
  notes: [],
  user_id: -1
};
export const mutations = {
  setNotes(state, payload) {
    state.notes = payload;
    state.notes.map(note => {
      note.created_at = moment(note.created_at).format("MM/DD/YYYY hh:mm");
      note.updated_at = moment(note.updated_at).format("MM/DD/YYYY hh:mm");
    });
  },
  deleteNote(state, payload) {
    state.notes = state.notes.filter(note => note.id != payload.id);
  }
};
export const getters = {
  notes(state) {
    return state.notes;
  }
};
export const actions = {
  createNote({ commit }, payload) {
    axios.post(`/api/create-note`, payload).then(res => {
      Vue.prototype.$notify({
        title: "Success!",
        message: "The note has been added.",
        type: "success"
      });
    });
  },

  async getNotes({ commit }, payload) {
    await axios.get(`/api/get-notes`).then(res => {
      commit("setNotes", res.data, res.user);
    });
  },

  editNote({ commit }, payload) {
    axios.put(`/api/update-note/${payload.id}`, payload.form).then(res => {});
  },

  async deleteNote({ commit }, payload) {
    await axios.delete(`/api/delete-note/${payload.id}`).then(res => {
      commit("deleteNote", payload.id);
      Vue.prototype.$notify({
        title: "Success!",
        message: "The note has been deleted successfully",
        type: "success"
      });
    });
  }
};
