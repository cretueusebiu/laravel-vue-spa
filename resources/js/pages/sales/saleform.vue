<template>
  <div>
    <v-app-bar
      dense
      flat
    >
      <v-btn
        class="mr-4"
        text
        to="/sales?list"
      >
        <v-icon>
          mdi-arrow-left
        </v-icon>
      </v-btn>

      <v-toolbar-title>{{ customerId ? "Update Invoice" : "New Invoice" }}</v-toolbar-title>
    </v-app-bar>
    <v-form v-if="!loading">
      <v-container>
        <form-alert :form="form" />
        <v-row>
          <v-col
            cols="12"
            md="6"
          >
            <customer-lookup @select="selectCustomer" />
          </v-col>

          <v-col
            cols="12"
            md="6"
          >
            <date-picker
              v-model="form.sale_time"
              :error-message="form.errors.get('sale_time')"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col
            cols="12"
            md="12"
          >
            <item-lookup @selected="addItem" />
          </v-col>
        </v-row>
        <v-row>
          <v-col
            cols="12"
            md="12"
          >
            <v-simple-table dense>
              <template #default>
                <thead>
                  <tr>
                    <th style="width:100px" />
                    <th style="width:100px">
                      Item #
                    </th>
                    <th>Name</th>
                    <th style="width:100px">
                      Price
                    </th>
                    <th style="width:100px">
                      Qty
                    </th>
                    <th style="width:100px">
                      Total
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="item in form.invoiceItems"
                    :key="item.name"
                  >
                    <td>
                      <v-btn
                        class="ma-2"
                        text
                        icon
                        color="red"
                        @click="removeItem(item.item_id)"
                      >
                        <v-icon>
                          mdi-delete
                        </v-icon>
                      </v-btn>
                    </td>
                    <td>{{ item.item_id }}</td>
                    <td>{{ item.name }}</td>
                    <td>
                      <v-text-field
                        v-model="item.price"
                      />
                    </td>
                    <td>
                      <v-text-field
                        v-model="item.quantity"
                        type="number"
                      />
                    </td>
                    <td>{{ parseFloat(item.price * item.quantity) }}</td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <th />
                    <th />
                    <th />
                    <th />
                    <th>{{ form.invoiceItems.reduce((sum, item) => sum + parseFloat(item.quantity), 0) }}</th>
                    <th>{{ form.invoiceItems.reduce((sum, item) => sum + parseFloat(item.price * item.quantity), 0) }}</th>
                  </tr>
                </tfoot>
              </template>
            </v-simple-table>
            <span class="error--text">{{ form.errors.get('invoiceItems') }}</span>
          </v-col>
        </v-row>
        <v-row>
          <v-col />
        </v-row>
        <v-row>
          <v-col
            cols="12"
            md="12"
          >
            <v-textarea
              v-model="form.comment"
              label="Comments"
              rows="2"
            />
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
              Submit
            </v-btn>
            <v-btn color="error">
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
import CustomerLookup from './components/CustomerLookup.vue'
import ItemLookup from './components/itemlookup.vue'
import DatePicker from '../../components/DatePicker.vue'
import FormAlert from '../../components/FormAlert.vue'

export default {
  components: { FormAlert, DatePicker, CustomerLookup, ItemLookup },
  middleware: 'auth',
  props: { customerId: String },
  data: function () {
    return {
      loading: false,
      modal: false,
      form: new Form({
        customer_id: '',
        sale_time: '',
        comment: '',
        invoiceItems: []
      })
    }
  },
  watch: {
  },
  mounted () {
    if (this.customerId) {
      this.loadData()
    }
  },
  methods: {
    onSaleDateChange (saleTime) {
      this.form.sale_time = saleTime
    },
    selectCustomer: function (customer) {
      console.log(customer)
    },
    addItem: function (item) {
      let found = false
      for (const invoiceItem of this.form.invoiceItems) {
        if (invoiceItem.item_id === item.item_id) {
          invoiceItem.quantity += 1
          found = true
        }
      }
      if (!found) {
        this.form.invoiceItems.push({
          item_id: item.item_id,
          name: item.name,
          price: parseFloat(item.unit_price),
          quantity: 1,
          total: 0
        })
      }
    },
    removeItem (itemId) {
      this.form.invoiceItems = this.form.invoiceItems.filter(item => item.item_id !== itemId)
    },
    loadData: function () {
      this.loading = true
      this.$http
        .get('/api/customers/' + this.customerId)
        .then(({ data }) => {
          // eslint-disable-next-line camelcase
          const {
            name,
            email,
            phone,
            gender,
            city,
            address,
            province,
            comments
          } = data
          this.form = new Form({
            name,
            email,
            phone,
            gender,
            city,
            address,
            province,
            comments
          })
          this.loading = false
        })
        .catch(error => {
          console.log(error)
          this.loading = false
        })
    },
    submitForm: function () {
      if (this.customerId) {
        this.form
          .put('/api/customers/' + this.customerId)
          .then(response => {
            this.$router.push({ name: 'customers' })
          })
          .catch(error => {
            console.log(error)
          })
      } else {
        this.form
          .post('/api/sales')
          .then(response => {
            this.$router.push({ name: 'sales' })
          })
          .catch(error => {
            console.log(error)
          })
      }
    }
  }
}
</script>
