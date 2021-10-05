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
                Item Name
              </th>
              <th scope="col">
                Category
              </th>
              <th scope="col">
                Item Type
              </th>
              <th scope="col" />
            </tr>
          </thead>
          <tbody>
            <tr v-for="item in items" :key="item.id">
              <th scope="row">
                {{ item.id }}
              </th>
              <td>{{ item.item_name }}</td>
              <td>{{ item.category }}</td>
              <td>{{ item.item_type }}</td>
              <td>
                <router-link :to="`items/edit/${item.id}`" class="btn btn-primary btn-sm">
                  <fa icon="edit" size="xs" fixed-width />
                </router-link>
                <button class="btn btn-danger btn-sm" @click="deleteItem(item.id)">
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
      items: []
    }
  },
  mounted () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      axios.get('/api/items').then(({ data }) => {
        this.items = data
      })
    },
    deleteItem: function (itemId) {
      axios.delete(`/api/items/${itemId}`).then(() => {
        this.loadData()
      })
    }
  }
}
</script>
