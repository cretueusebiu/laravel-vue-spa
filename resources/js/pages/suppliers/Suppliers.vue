<template>
  <div>
    <div class="row">
      <div class="col">
        <router-link :to="{ name : 'suppliers.add' }" class="btn btn-primary float-end">
          Add Supplier
        </router-link>
      </div>
    </div>
  <suppliers-list />
  </div>
</template>
<script>
import SuppliersList from './supplierslist.vue'

export default {
  components: { SuppliersList },
  middleware: 'auth'
}
</script>
