<template>
  <div class="row" v-if="user.id == this.$route.params.userId">
    <div class="col-lg-10 m-auto">
      <div class="d-flex w-100 justify-content-center flex-column">
        <card :title="$t('note')">
          <small>
            <router-link
              :to="{ name: 'note' }"
              class="d-flex text-center text-dark p-2"
              >Back
            </router-link>
          </small>
          <h3><center>Note Express</center></h3>

          <h4>
            <center>Please edit the note below</center>
          </h4>
          <div
            class="form-group d-flex flex-column justify-content-center text-center mt-2"
          >
            <form @submit.prevent="editNote" ref="editNote" :model="Notes">
              <label for="note-subject"
                ><span class="text-center"
                  >Subject<sup class="text-danger">*</sup></span
                ></label
              >
              <input
                id="note-subject"
                type="text"
                v-model="form.subject"
                class="form-control m-2"
                name="subject"
                required
              />
              <label for="note-message"
                ><span class="text-center"
                  >Note Details<sup class="text-danger">*</sup></span
                ></label
              >
              <textarea
                id="note-message"
                v-model="form.note"
                class="form-control m-2"
                name="note"
                required
              />
              <center>
                <button
                  type="submit"
                  class="btn btn-primary m-2"
                  @click="editNote()"
                >
                  Update Note
                </button>
              </center>
            </form>
          </div>
        </card>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
import Vue from "vue";
import { mapGetters } from "vuex";
export default {
  mounted() {},

  data() {
    return {
      form: new Form({
        subject: this.$route.params.subject,
        note: this.$route.params.note
      })
    };
  },
  middleware: "auth",

  methods: {
    async editNote() {
      if (this.$route.params.id) {
        if (
          this.form.subject !== null &&
          this.form.subject !== "" &&
          this.form.note != null &&
          this.form.note != ""
        ) {
          await this.$store.dispatch("note/editNote", {
            id: this.$route.params.id,
            form: this.form
          });
          await this.$router.push({ name: "note" });
          await this.$store.dispatch("note/getNotes");
          Vue.prototype.$notify({
            title: "Success!",
            message: "The note has been updated.",
            type: "success"
          });
        }
      }
    }
  },
  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },
  computed: mapGetters({
    user: "auth/user"
  }),

  metaInfo() {
    return { title: this.$t("note") };
  }
};
</script>
