<template>
  <v-simple-table>
    <template #default>
      <thead>
        <tr>
          <th class="text-left">
            #
          </th>
          <th class="text-left">
            Customer Name
          </th>
          <th class="text-left">
            Email
          </th>
          <th class="text-left">
            Gender
          </th>
          <th class="text-left">
            Phone
          </th>
          <th />
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="customer in customers" :key="customer.id"
        >
          <th>{{ customer.id }}</th>
          <td>{{ customer.name }}</td>
          <td>{{ customer.email }}</td>
          <td>{{ customer.phone }}</td>
          <td>{{ customer.gender[0].toUpperCase() }}</td>
          <td>
            <v-btn
              :to="`customers/edit/${customer.id}`"
              class="mx-2"
              dark
              small
              color="primary"
            >
              <v-icon dark>
                mdi-pencil
              </v-icon>
            </v-btn>
            <v-btn
              dark
              small
              color="error"
              @click="deleteCustomer(customer.id)"
            >
              <v-icon dark>
                mdi-delete
              </v-icon>
            </v-btn>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>

<script>
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
      this.$http.get('/api/customers').then(({ data }) => {
        this.customers = data
      })
    },
    deleteCustomer: function (customerId) {
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
          this.$http.delete(`/api/customers/${customerId}`).then(() => {
            this.loadData()
          })
        }
      })
    }
  }
}
</script>
