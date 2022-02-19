<template>
  <div class="row">
    <div class="d-flex w-100 justify-content-center flex-column">
      <h3><center>Note Express</center></h3>
      <h4>
        <center>Please fill out the form to add your note below</center>
      </h4>
      <div
        class="form-group d-flex flex-column justify-content-center text-center mt-2"
      >
        <form @submit.prevent ref="createNote" :model="Notes">
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
              @click="createNote()"
            >
              Add note
            </button>
          </center>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
export default {
  middleware: "auth",
  name: "NoteForm",
  mounted() {},
  data() {
    return {
      form: new Form({
        subject: null,
        note: null
      })
    };
  },
  methods: {
    async createNote() {
      if (
        this.form.subject !== null &&
        this.form.subject !== "" &&
        this.form.note != null &&
        this.form.note != ""
      ) {
        await this.$store.dispatch("note/createNote", this.form);
        await this.$store.dispatch("note/getNotes");
      }
    }
  },
  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo() {
    return { title: this.$t("note") };
  }
};
</script>
