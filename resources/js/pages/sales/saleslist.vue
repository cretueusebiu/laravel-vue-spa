<template>
  <v-simple-table>
    <template #default>
      <thead>
        <tr>
          <th class="text-left">
            Inv #
          </th>
          <th class="text-left">
            Date
          </th>
          <th class="text-left">
            Customer
          </th>
          <th />
        </tr>
      </thead>
      <tbody>
        <tr v-for="sale in sales" :key="sale.id">
          <td>{{ sale.id }}</td>
          <td>{{ sale.sale_time }}</td>
          <td>{{ sale.customer_name }}</td>
          <td>
            <v-btn
              :to="`sales/edit/${sale.id}`"
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
              @click="deleteSale(item.id)"
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
import axios from 'axios'
export default {
  data () {
    return {
      sales: []
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      axios.get('/api/sales').then(({ data }) => {
        this.sales = data
      })
    },
    deleteSale: function (saleId) {
      axios.delete(`/api/sales/${saleId}`).then(() => {
        this.loadData()
      })
    }
  }
}
</script>
