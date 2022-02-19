<template>
  <div class="row">
    <div class="col-lg-10 m-auto">
      <card :title="$t('note')">
        <small>
          <router-link
            :to="{ name: 'rate' }"
            class="d-flex text-center text-dark p-2"
            >Click here for Rate Express
          </router-link>
        </small>

        <NoteForm />
        <hr />
        <h4><center>Your notes:</center></h4>
        <div>
          <el-table :data="notes" style="width: 100%" :key="tablekey">
            <el-table-column
              v-for="column in notesColumns"
              :key="column.label"
              :id="column.id"
              :label="column.label"
              :prop="column.prop"
              :column-key="column.prop"
              :min-width="column.minWidth"
              :sortable="column.sortable"
              :align="column.align"
              :header-align="column.align"
            ></el-table-column>
            <el-table-column align="right">
              <template slot="header" slot-scope="scope" v-if="scope.row">
              </template>
              <template slot-scope="scope"
                ><el-button
                  size="mini"
                  type="success"
                  @click="editNote(scope.$index, scope.row)"
                  >Edit</el-button
                >
                <el-button
                  size="mini"
                  type="danger"
                  @click="deleteNote(scope.$index, scope.row)"
                  >Delete</el-button
                ></template
              >
            </el-table-column>
          </el-table>
        </div>
      </card>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
import NoteForm from "./forms/NoteForm";
import Element from "element-ui";
import Form from "vform";
import ElementUI from "element-ui";
import { Table } from "element-ui";
import { mapGetters } from "vuex";
export default {
  middleware: "auth",
  components: {
    NoteForm: NoteForm
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
      form: new Form({
        subject: null,
        note: null
      }),
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
          prop: "updated_at",
          label: "Updated At",
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
    editNote(index, row) {
      this.$router.push({
        name: "noteEdit",
        params: {
          id: row.id,
          subject: row.subject,
          note: row.message,
          userId: row.userId
        }
      });
    },

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
