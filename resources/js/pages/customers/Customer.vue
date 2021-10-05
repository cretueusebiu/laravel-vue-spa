<template>
  <div>
    <div class="row">
      <div class="col">
        <router-link :to="{ name : 'customers.add' }" class="btn btn-primary float-end">
          Add Customer
        </router-link>
      </div>
    </div>
    <customers-list />
  </div>
</template>

<script>
import CustomersList from './customerslist.vue'

export default {
  components: { CustomersList },
  middleware: 'auth'
}
</script>
