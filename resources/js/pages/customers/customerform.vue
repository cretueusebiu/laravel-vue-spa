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

      <v-toolbar-title>{{ customerId ? "Update Customer" : "Add Customer" }}</v-toolbar-title>
    </v-app-bar>
    <v-form v-if="!loading">
      <v-container>
        <v-alert v-if="form.errors.any()" type="error">
          There were some problems with your input.
        </v-alert>
        <v-row>
          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="form.name"
              :rules="nameRules"
              :error-messages="form.errors.get('name')"
              label="Name"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="form.email"
              :rules="emailRules"
              :error-messages="form.errors.get('email')"
              label="Email"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="form.phone"
              :error-messages="form.errors.get('phone')"
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
              v-model="form.address"
              :error-messages="form.errors.get('address')"
              label="Address"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="form.city"
              :error-messages="form.errors.get('city')"
              label="City"
              required
            />
          </v-col>

          <v-col
            cols="12"
            md="4"
          >
            <v-text-field
              v-model="form.province"
              :error-messages="form.errors.get('province')"
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
              v-model="form.gender"
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
              v-model="form.comments"
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
            <v-btn :to="{ name : 'customers' }" color="error">
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

export default {
  middleware: 'auth',
  props: { customerId: String },
  data: function () {
    return {
      loading: false,
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 20 || 'Name must be less than 20 characters'
      ],
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ],
      form: new Form({
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
  mounted () {
    if (this.customerId) {
      this.loadData()
    }
  },
  methods: {
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
          .post('/api/customers')
          .then(response => {
            this.$router.push({ name: 'customers' })
          })
          .catch(error => {
            console.log(error)
          })
      }
    }
  }
}
</script>
