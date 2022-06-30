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
      :items="item"
      :options.sync="options"
      :server-items-length="totalCustomers"
      :loading="loading"
      item-key="name"
    >
      <template #item.actions="{ item }">
        <v-icon
          small
          class="mr-2"
          @click="$router.push({ name : 'customers.edit', params: { employeeId: item.id } })"
        >
          mdi-pencil
        </v-icon>
        <v-icon
          small
          @click="deleteCustomer(item)"
        >
          mdi-delete
        </v-icon>
      </template>
    </v-data-table>
  </v-card>
</template>


<script>
import axios from 'axios'
export default {
  data () {
    return {
      employees: []
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      axios.get('/api/employees').then(({ data }) => {
        this.employees = data
      })
    },
    deleteEmployee: function (employeeId) {
      axios.delete(`/api/employees/${employeeId}`).then(() => {
        this.loadData()
      })
    }
  }
}
</script>
