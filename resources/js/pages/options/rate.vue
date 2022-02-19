<template>
  <div class="row">
    <div class="col-lg-10 m-auto">
      <card :title="$t('note')">
        <small>
          <router-link
            :to="{ name: 'note' }"
            class="d-flex text-center text-dark p-2"
            >Click here for Note Express
          </router-link>
        </small>
        <RateForm />
      </card>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
import RateForm from "./forms/RateForm";
import Element from "element-ui";
import ElementUI from "element-ui";
import { Table } from "element-ui";
import { mapGetters } from "vuex";
export default {
  middleware: "auth",
  components: {
    RateForm: RateForm
  },
  async mounted() {
    await this.$store.dispatch("note/getNotes");
  },
  computed: {
    ...mapGetters({
      notes: "note/notes"
    })
  },
  data() {
    return {
      search: null,
      tablekey: 0,
      notesColumns: [
        {
          prop: "created_at",
          label: "Created At",
          minWidth: 100,
          sortable: true,
          hidden: true,
          align: "center",
          fixed: true
        },
        {
          prop: "subject",
          label: "Subject",
          minWidth: 100,
          sortable: false,
          hidden: true,
          align: "center",
          fixed: true
        },
        {
          prop: "message",
          label: "Message",
          minWidth: 100,
          sortable: false,
          hidden: true,
          align: "center",
          fixed: true
        }
      ]
    };
  },

  methods: {
    editNote(index, row) {},
    async deleteNote(index, row) {
      await this.$store.dispatch("note/deleteNote", {
        id: row.id
      });
      await this.$store.dispatch("note/getNotes");
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
