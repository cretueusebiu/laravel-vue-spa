<template>
  <div>
    <v-btn
      color="primary"
      class="ma-4"
      :to="{ name : 'sales.add' }"
    >
      Add Sale
    </v-btn>
    <items-list />
  </div>
</template>

<script>
import ItemsList from './itemslist.vue'

export default {
  components: { ItemsList },
  middleware: 'auth'
}
</script>
