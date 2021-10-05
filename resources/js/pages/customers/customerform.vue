<template>
  <div class="row my-4">
    <div class="col">
      <form @submit.prevent="submitForm" @keydown="form.onKeyDown($event)">
        <div class="card">
          <div class="card-header">
            <h5>
              <router-link to="/customers">
                <fa icon="arrow-left" class="me-2" />
              </router-link>
              {{ customerId ? "Update Customer" : "Add Customer" }}
            </h5>
          </div>
          <div v-if="!loading" class="card-body row g-3">
            <AlertError :form="form">
              There were some problems with your input.
            </AlertError>
            <!-- Add name -->
            <div class="col-md-4">
              <label for="name" class="form-label">Customer Name</label>
              <input
                id="name"
                v-model="form.name"
                type="text"
                :class="{ 'is-invalid': form.errors.has('name') }"
                class="form-control"
              >
              <has-error :form="form" field="name" />
            </div>
            <!-- Add email -->
            <div class="col-md-4">
              <label for="email" class="form-label">Email</label>
              <input
                id="email"
                v-model="form.email"
                type="text"
                :class="{ 'is-invalid': form.errors.has('email') }"
                class="form-control"
              >
              <has-error :form="form" field="email" />
            </div>
            <!-- Add phone -->
            <div class="col-md-4">
              <label for="phone" class="form-label">phone</label>
              <input
                id="phone"
                v-model="form.phone"
                type="text"
                :class="{ 'is-invalid': form.errors.has('phone') }"
                class="form-control"
              >
              <has-error :form="form" field="phone" />
            </div>
            <!-- Add Address -->
            <div class="col-md-6">
              <label for="address" class="form-label">Address</label>
              <input
                id="address"
                v-model="form.address"
                type="text"
                :class="{ 'is-invalid': form.errors.has('address') }"
                class="form-control"
              >
              <has-error :form="form" field="address" />
            </div>
            <!-- Add City -->
            <div class="col-md-3">
              <label for="city" class="form-label">City</label>
              <input
                id="city"
                v-model="form.city"
                type="text"
                :class="{ 'is-invalid': form.errors.has('city') }"
                class="form-control"
              >
              <has-error :form="form" field="city" />
            </div>
            <!-- Add Province -->
            <div class="col-md-3">
              <label for="province" class="form-label">Province</label>
              <input
                id="province"
                v-model="form.province"
                type="text"
                :class="{ 'is-invalid': form.errors.has('province') }"
                class="form-control"
              >
              <has-error :form="form" field="province" />
            </div>
            <!-- Add Comments -->
            <div class="mb-3">
              <label for="comments" class="form-label">Comments</label>
              <textarea
                id="comments"
                v-model="form.comments"
                type="text"
                :class="{ 'is-invalid': form.errors.has('comments') }"
                class="form-control"
              />
              <has-error :form="form" field="comments" />
            </div>
            <!-- Add Gender -->
            <div class="mb-3">
              <label class="form-label" for="customer_gender">Customer Gender</label><br>
              <input
                id="customer_gender_male"
                v-model="form.gender"
                type="radio"
                value="male"
                class="form-check-input"
              >
              <label class="form-check-label" for="customer_gender_male">Male</label>
              <input
                id="customer_gender_female"
                v-model="form.gender"
                type="radio"
                value="female"
                class="form-check-input"
              >
              <label class="form-check-label" for="customer_gender_female">Female</label>
              <has-error :form="form" field="item_type" />
            </div>
          </div>
          <div class="card-footer">
            <v-button :loading="form.busy" type="success" @click="submitForm">
              {{ customerId ? "Update" : "Submit" }}
            </v-button>
            <router-link
              :to="{ name: 'customers' }"
              class="btn btn-danger float-end"
            >
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

export default {
  middleware: 'auth',
  props: { customerId: String },
  data: function () {
    return {
      loading: false,
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
