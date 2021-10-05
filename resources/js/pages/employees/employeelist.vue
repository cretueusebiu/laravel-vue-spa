<template>
  <div class="row my-4">
    <div class="col card">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">
                #
              </th>
              <th scope="col">
                Employee Name
              </th>
              <th scope="col">
                Email
              </th>
              <th scope="col">
                Mobile
              </th>
              <th scope="col">
                Gender
              </th>
              <th scope="col" />
            </tr>
          </thead>
          <tbody>
            <tr v-for="employee in employees" :key="employee.id">
              <th scope="row">
                {{ employee.id }}
              </th>
                <td>{{ employee.name }}</td>
                <td>{{ employee.email }}</td>
                <td>{{ employee.phone }}</td>
                <td>{{ employee.gender }}</td>
              <td>
                <router-link :to="`employees/edit/${employee.id}`" class="btn btn-primary btn-sm">
                  <fa icon="edit" size="xs" fixed-width />
                </router-link>
                <button class="btn btn-danger btn-sm" @click="deleteEmployee(employee.id)">
                  <fa icon="trash" size="xs" fixed-width />
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
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
