<template>
  <div>
    <v-btn
      color="primary"
      class="ma-4"
      :to="{ name : 'sales.add' }"
    >
      Add Sale
    </v-btn>
    <sales-list />
  </div>
</template>

<script>
import SalesList from './saleslist.vue'

export default {
  components: { SalesList },
  middleware: 'auth'
}
</script>
