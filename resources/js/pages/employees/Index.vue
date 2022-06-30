<template>
  <v-card
    rounded="lg"
  >
    <v-card-title>Employees</v-card-title>
    <v-card-text
      class="d-flex align-center flex-wrap pb-0"
    >
      <v-text-field
        v-model="searchText"
        outlined
        dense
        hide-details
        placeholder="Search"
        class="search-input me-3 mb-4"
        @keyup.enter="loadData"
      />
      <v-spacer />
      <div class="d-flex align-center flex-wrap">
        <v-btn
          color="primary"
          :to="{ name : 'employees.add' }"
          class="me-3 mb-4"
        >
          <v-icon>
            mdi-plus
          </v-icon>
          Add Employee
        </v-btn>
      </div>
    </v-card-text>
    <v-data-table
      :headers="headers"
      :items="employees"
      :options.sync="options"
      :server-items-length="totalEmployees"
      :loading="loading"
      item-key="name"
    >
      <template #item.actions="{ item }">
        <v-icon
          small
          class="mr-2"
          @click="$router.push({ name : 'employees.edit', params: { employeeId: item.id } })"
        >
          mdi-pencil
        </v-icon>
        <v-icon
          small
          @click="deleteEmployee(item)"
        >
          mdi-delete
        </v-icon>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
  middleware: 'auth',
  data () {
    return {
      totalEmployees: 0,
      loading: true,
      options: {},
      headers: [
        { text: 'ID', value: 'id' },
        { text: 'Employee Name', value: 'name' },
        { text: 'Email', value: 'email' },
        { text: 'Phone', value: 'phone' },
        { text: 'Created At', value: 'created_at' },
        { text: 'Actions', value: 'actions', sortable: false }
      ],
      employees: [],
      searchText: ''
    }
  },
  watch: {
    options: {
      handler () {
        this.loadData()
      },
      deep: true
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      this.loading = true
      const { sortBy, sortDesc, page, itemsPerPage } = this.options
      this.$http.get(`/api/employees?per_page=${itemsPerPage}&page=${page}&orderBy=${sortBy}&orderDesc=${sortDesc}&q=${this.searchText}`)
        .then(response => {
          const { meta, data } = response.data
          this.totalEmployees = meta && meta.total
          this.employees = data || []
          this.loading = false
        })
        .catch(error => {
          this.totalEmployees = 0
          this.loading = false
          if (error.response && error.response.data) {
            this.$set(this.form, 'errorMessage', error.response.data.message)
          }
          console.log(error)
        })
    },
    deleteEmployee: function (employee) {
      this.$confirm.fire({
        icon: 'warning',
        title: 'Delete Confirm',
        text: 'Are you sure you want to delete this customer?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$http.delete(`/api/employees/${employee.id}`).then(({ data }) => {
            this.$store.dispatch('snackbar/showMessage', data.message)
            this.loadData()
          })
        }
      })
    }
  }
}
</script>

<style lang="scss" scoped>
.search-input{
  max-width: 200px;
}
</style>
