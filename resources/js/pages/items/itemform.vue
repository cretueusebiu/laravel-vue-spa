<template>
  <v-card
    rounded="lg"
  >
    <v-card-title v-if="!itemId">
      Add Item
    </v-card-title>
    <v-card-title v-if="itemId">
      Update Item
    </v-card-title>
    <v-card-text>
      <form-alert :form="form" />
      <v-form class="multi-col-validation">
        <v-row>
          <v-col
            cols="12"
            md="6"
          >
            <v-text-field
              v-model="form.item_name"
              :error-messages="form.errors.get('item_name')"
              label="Item Name"
              required
              outlined
              dense
              hide-details="auto"
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
              outlined
              dense
              hide-details="auto"
            />
          </v-col>

          <v-col
            cols="12"
            md="12"
          >
            <v-radio-group
              v-model="form.item_type"
              :error-messages="form.errors.get('item_type')"
              row
            >
              <template #label>
                <div>Item Type</div>
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
              color="primary"
              :loading="form.busy"
              :disabled="form.busy"
              @click="submitForm"
            >
              {{ itemId ? 'Update' : 'Submit' }}
            </v-btn>
            <v-btn
              :to="{ name : 'items' }"
              type="reset"
              color="error"
              class="mx-2"
            >
              Cancel
            </v-btn>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
import Form from 'vform'
import FormAlert from '../../components/FormAlert.vue'

export default {
  components: { FormAlert },
  middleware: 'auth',
  props: { itemId: Number },
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
      this.$http
        .get('/api/items/' + this.itemId)
        .then(({ data }) => {
          // eslint-disable-next-line camelcase
          const { item_name, category, item_type } = data.data
          this.form = new Form({
            item_name,
            category,
            item_type
          })
          this.loading = false
        })
        .catch(error => {
          console.log(error)
          this.loading = false
        })
    },
    submitForm: function () {
      if (this.itemId) {
        this.form
          .put('/api/items/' + this.itemId)
          .then(({ data }) => {
            this.$store.dispatch('snackbar/showMessage', data.message)
            this.$router.push({ name: 'items' })
          })
          .catch(error => {
            if (error.response && error.response.data) {
              this.$set(this.form, 'errorMessage', error.response.data.message)
            }
            console.log(error)
          })
      } else {
        this.form
          .post('/api/items')
          .then(({ data }) => {
            this.$store.dispatch('snackbar/showMessage', data.message)
            this.$router.push({ name: 'items' })
          })
          .catch(error => {
            if (error.response && error.response.data) {
              this.$set(this.form, 'errorMessage', error.response.data.message)
            }
            console.log(error)
          })
      }
    }
  }
}
</script>
