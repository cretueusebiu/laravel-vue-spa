<template>
  <div class="row my-4">
    <div class="col">
      <form @submit.prevent="submitForm" @keydown="form.onKeyDown($event)">
        <div class="card">
          <div class="card-header">
            {{ itemId ? 'Update Item' : 'Add Item' }}
          </div>
          <div v-if="!loading" class="card-body">
            <AlertError :form="form">
              There were some problems with your input.
            </AlertError>
            <div class="mb-3">
              <label for="item_name" class="form-label">Item Name</label>
              <input id="item_name" v-model="form.item_name" type="text" :class="{ 'is-invalid': form.errors.has('item_name') }" class="form-control">
              <has-error :form="form" field="item_name" />
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <input id="category" v-model="form.category" type="text" class="form-control">
              <has-error :form="form" field="category" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="item_type">Item Type</label><br>
              <input id="item_type_product" v-model="form.item_type" type="radio" value="product" class="form-check-input">
              <label class="form-check-label" for="item_type_product">Product</label>
              <input id="item_type_service" v-model="form.item_type" type="radio" value="service" class="form-check-input">
              <label class="form-check-label" for="item_type_service">Service</label>
              <has-error :form="form" field="item_type" />
            </div>
          </div>
          <div class="card-footer">
            <v-button :loading="form.busy" type="success" @click="submitForm">
              {{ itemId ? 'Update' : 'Submit' }}
            </v-button>
            <router-link :to="{ name : 'items' }" class="btn btn-danger float-end">
              Cancel
            </router-link>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import axios from 'axios'

export default {
  middleware: 'auth',
  props: ['itemId'],
  data: function () {
    return {
      loading: false,
      form: new Form({
        item_name: '',
        category: '',
        item_type: 'product'
      })
    }
  },
  mounted () {
    if (this.itemId) {
      this.loadData()
    }
  },
  methods: {
    loadData: function () {
      this.loading = true
      axios.get('/api/items/' + this.itemId).then(({ data }) => {
        // eslint-disable-next-line camelcase
        const { item_name, category, item_type } = data.data
        this.form = new Form({
          item_name,
          category,
          item_type
        })
        this.loading = false
      }).catch((error) => {
        console.log(error)
        this.loading = false
      })
    },
    submitForm: function () {
      if (this.itemId) {
        this.form.put('/api/items/' + this.itemId).then((response) => {
          this.$router.push({ name: 'items' })
        }).catch((error) => {
          console.log(error)
        })
      } else {
        this.form.post('/api/items').then((response) => {
          this.$router.push({ name: 'items' })
        }).catch((error) => {
          console.log(error)
        })
      }
    }
  }
}
</script>
