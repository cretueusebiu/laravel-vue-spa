<template>
  <div>
    <div class="row">
      <div class="col">
        <router-link :to="{ name : 'items.add' }" class="btn btn-primary float-end">
          Add Item
        </router-link>
      </div>
    </div>
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
