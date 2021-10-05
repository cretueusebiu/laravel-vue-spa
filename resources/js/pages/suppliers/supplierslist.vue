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
                Supplier Name
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
            <tr v-for="supplier in suppliers" :key="supplier.id">
              <th scope="row">
                {{ supplier.id }}
              </th>
                <td>{{ supplier.name }}</td>
                <td>{{ supplier.email }}</td>
                <td>{{ supplier.phone }}</td>
                <td>{{ supplier.gender }}</td>
              <td>
                <router-link :to="`suppliers/edit/${supplier.id}`" class="btn btn-primary btn-sm">
                  <fa icon="edit" size="xs" fixed-width />
                </router-link>
                <button class="btn btn-danger btn-sm" @click="deleteSupplier(supplier.id)">
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
      suppliers: []
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      axios.get('/api/suppliers').then(({ data }) => {
        this.suppliers = data
      })
    },
    deleteSupplier: function (supplierId) {
      axios.delete(`/api/suppliers/${supplierId}`).then(() => {
        this.loadData()
      })
    }
  }
}
</script>
