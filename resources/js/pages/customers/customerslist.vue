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
                Customer Name
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
            <tr v-for="customer in customers" :key="customer.id">
              <th scope="row">
                {{ customer.id }}
              </th>
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.phone }}</td>
                <td>{{ customer.gender }}</td>
              <td>
                <router-link :to="`customers/edit/${customer.id}`" class="btn btn-primary btn-sm">
                  <fa icon="edit" size="xs" fixed-width />
                </router-link>
                <button class="btn btn-danger btn-sm" @click="deleteCustomer(customer.id)">
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
      customers: []
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      axios.get('/api/customers').then(({ data }) => {
        this.customers = data
      })
    },
    deleteCustomer: function (customerId) {
      axios.delete(`/api/customers/${customerId}`).then(() => {
        this.loadData()
      })
    }
  }
}
</script>
