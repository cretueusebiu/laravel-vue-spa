<template>
  <div>
    <v-btn
      color="primary"
      class="ma-4"
      :to="{ name : 'items.add' }"
    >
      Add Item
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
