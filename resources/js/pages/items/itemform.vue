<template>
  <div>
    <v-app-bar
      dense
      flat
    >
      <v-btn
        class="mr-4"
        text
      >
        <v-icon>
          mdi-arrow-left
        </v-icon>
      </v-btn>

      <v-toolbar-title>{{ itemId ? 'Update Item' : 'Add Item' }}</v-toolbar-title>
    </v-app-bar>
    <v-form v-if="!loading">
      <v-container>
        <v-alert v-if="form.errors.any()" type="error">
          There were some problems with your input.
        </v-alert>
        <v-row>
          <v-col
            cols="12"
            md="6"
          >
            <v-text-field
              v-model="form.name"
              :error-messages="form.errors.get('name')"
              label="Item Name"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="6"
          >
            <v-text-field
              v-model="form.category"
              :error-messages="form.errors.get('category')"
              label="Category"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="12"
          >
            <v-radio-group
              v-model="form.stock_type"
              :error-messages="form.errors.get('stock_type')"
              row
            >
              <template #label>
                <div>Stock Type</div>
              </template>
              <v-radio
                label="Stock"
                value="0"
              />
              <v-radio
                label="Non-Stocked"
                value="1"
              />
            </v-radio-group>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-btn
              color="success"
              class="mr-4"
              :loading="form.busy"
              :disabled="form.busy"
              @click="submitForm"
            >
              {{ itemId ? 'Update' : 'Submit' }}
            </v-btn>
            <v-btn :to="{ name : 'items' }" color="error">
              Cancel
            </v-btn>
          </v-col>
        </v-row>
      </v-container>
    </v-form>
  </div>
</template>

<script>
import Form from 'vform'
import axios from 'axios'

export default {
  middleware: 'auth',
  props: { itemId: String },
  data: function () {
    return {
      loading: false,
      form: new Form({
        item_name: '',
        category: '',
        stock_type: '0'
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
