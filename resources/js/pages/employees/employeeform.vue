<template>
  <v-card
    rounded="lg"
  >
    <v-card-title v-if="!employeeId">
      Add Employee
    </v-card-title>
    <v-card-title v-if="employeeId">
      Update Employee
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
              v-model="form.name"
              
              :error-messages="form.errors.get('name')"
              label="Name"
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
              v-model="form.email"
              
              :error-messages="form.errors.get('email')"
              label="Email"
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
              v-model="form.phone"
              :error-messages="form.errors.get('phone')"
              label="Phone"
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
              v-model="form.address"
              :error-messages="form.errors.get('address')"
              label="Address"
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
              v-model="form.city"
              :error-messages="form.errors.get('city')"
              label="City"
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
              v-model="form.province"
              :error-messages="form.errors.get('province')"
              label="Province"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>

          <v-col cols="12">
            <v-textarea
              v-model="form.comments"
              label="Comments"
              rows="2"
              outlined
            />
          </v-col>

          <v-col cols="12">
            <v-btn v-if="!employeeId"
              color="primary"
              :loading="form.busy"
              :disabled="form.busy"
              @click="submitForm"
            >
              Submit
            </v-btn>
            
            <v-btn v-if="employeeId"
              color="primary"
              :loading="form.busy"
              :disabled="form.busy"
              @click="submitForm"
            >
              Update
            </v-btn>
            <v-btn
              :to="{ name : 'employees' }"
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
  props: { employeeId: Number },
  data: function () {
    return {
      loading: false,
      // nameRules: [
      //   v => !!v || 'Name is required',
      //   v => v.length <= 20 || 'Name must be less than 20 characters'
      // ],
      // emailRules: [
      //   v => !!v || 'E-mail is required',
      //   v => /.+@.+/.test(v) || 'E-mail must be valid'
      // ],
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
    if (this.employeeId) {
      this.loadData()
    }
  },
  methods: {
    loadData: function () {
      this.loading = true
      this.$http
        .get('/api/employees/' + this.employeeId)
        .then(({ data }) => {
          // eslint-disable-next-line camelcase
          const {
            name,
            email,
            phone,
            city,
            address,
            province,
            comments
          } = data
          this.form = new Form({
            name,
            email,
            phone,
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
      if (this.employeeId) {
        this.form
          .put('/api/employees/' + this.employeeId)
          .then(({ data }) => {
            this.$store.dispatch('snackbar/showMessage', data.message)
            this.$router.push({ name: 'employees' })
          })
          .catch(error => {
            if (error.response && error.response.data) {
              this.$set(this.form, 'errorMessage', error.response.data.message)
            }
            console.log(error)
          })
      } else {
        this.form
          .post('/api/employees')
          .then(({ data }) => {
            this.$store.dispatch('snackbar/showMessage', data.message)
            this.$router.push({ name: 'employees' })
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
