<template>
  <div class="row my-4">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <caption>Customers List</caption>
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
                <td>{{ customer.gender[0].toUpperCase() }}</td>
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
  </div>
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
