<template>
  <div>
    <v-autocomplete
      v-model="searchItem"
      :loading="searchLoading"
      :items="searchItems"
      :search-input.sync="searchText"
      item-text="name"
      item-value="id"
      flat
      hide-no-data
      hide-details
      label="Search customer"
    >
      <template #item="data">
        <template v-if="typeof data.item !== 'object'">
          <v-list-item-content v-text="data.item" />
        </template>
        <template v-else>
          <v-list-item-content v-text="data.item" />
          <v-list-item-content>
            <v-list-item-title v-html="data.item.name" />
            <v-list-item-subtitle v-html="data.item.email" />
          </v-list-item-content>
          <v-list-item-action v-if="data.item.person_id < 1">
            <v-btn
              icon
              @click.stop="dialog = true"
            >
              <v-icon large color="green lighten-1">
                mdi-plus
              </v-icon>
            </v-btn>
          </v-list-item-action>
        </template>
      </template>
    </v-autocomplete>

    <v-dialog
      v-model="dialog"
      persistent
    >
      <v-card>
        <v-card-title>
          <span class="text-h5">Add Customer</span>
        </v-card-title>
        <v-card-text>
          <v-row>
            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.name"
                :rules="nameRules"
                :error-messages="customer.errors.get('name')"
                label="Name"
                required
              />
            </v-col>

            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.email"
                :rules="emailRules"
                :error-messages="customer.errors.get('email')"
                label="Email"
                required
              />
            </v-col>

            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.phone"
                :error-messages="customer.errors.get('phone')"
                label="Phone"
                required
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.address"
                :error-messages="customer.errors.get('address')"
                label="Address"
                required
              />
            </v-col>

            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.city"
                :error-messages="customer.errors.get('city')"
                label="City"
                required
              />
            </v-col>

            <v-col
              cols="12"
              md="4"
            >
              <v-text-field
                v-model="customer.province"
                :error-messages="customer.errors.get('province')"
                label="Province"
                required
              />
            </v-col>
          </v-row>
          <v-row>
            <v-col
              cols="12"
              md="4"
            >
              <v-radio-group
                v-model="customer.gender"
                row
              >
                <v-radio
                  label="Male"
                  value="male"
                />
                <v-radio
                  label="Female"
                  value="female"
                />
              </v-radio-group>
            </v-col>
          </v-row>
          <v-row>
            <v-col
              cols="12"
              md="12"
            >
              <v-textarea
                v-model="customer.comments"
                label="Comments"
                rows="2"
              />
            </v-col>
          </v-row>
          <small class="red--text">* indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer />
          <v-btn
            color="blue darken-1"
            text
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            color="blue darken-1"
            text
            @click="addCustomer"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import Form from 'vform'
export default {
  data: function () {
    return {
      loading: false,
      invoiceItems: [],
      searchLoading: false,
      searchItems: [],
      searchText: null,
      searchItem: null,
      searchDebounce: null,
      dialog: false,
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 20 || 'Name must be less than 20 characters'
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      customer: new Form({
        name: '',
        email: '',
        phone: '',
        gender: 'male',
        city: '',
        address: '',
        province: '',
        comments: ''
      })
    }
  },
  watch: {
    searchText (val) {
      if (!val) {
        return
      }
      const sItem = this.searchItems.find(x => x.item_id === this.searchItem)
      if (sItem && sItem.name === val) {
        console.log('select clicked')
        this.searchItem = null
        this.$emit('selected', sItem)
        return
      }
      clearTimeout(this.searchDebounce)
      this.searchDebounce = setTimeout(() => {
        val && val !== this.searchItem && this.querySelections(val)
      }, 350)
    },
    searchItem (itemId) {
      if (itemId) {
        return 
      }
      const sItem = this.searchItems.find(x => x.item_id === itemId)
      if (!sItem) {
        alert('Item not found')
      }
    }
  },
  methods: {
    querySelections (v) {
      this.searchLoading = true
      this.$http
        .get('/api/customers/search?q=' + v)
        .then(({ data }) => {
          this.searchItems = data
          this.searchLoading = false
        })
    },
    openModal () {
      this.dialog = true
    },
    addCustomer () {
      this.customer
        .post('/api/customers')
        .then(response => {
          console.log(response)
        })
        .catch(error => {
          console.log(error)
        })
    }
  }
}
</script>
