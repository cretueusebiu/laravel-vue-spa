<template>
  <v-autocomplete
    v-model="searchItem"
    :loading="searchLoading"
    :items="searchItems"
    :search-input.sync="searchText"
    item-text="name"
    item-value="item_id"
    flat
    hide-no-data
    hide-details
    label="Search item"
  >
    <template #item="data">
      <template v-if="typeof data.item !== 'object'">
        <v-list-item-content v-text="data.item" />
      </template>
      <template v-else>
        <v-list-item-content>
          <v-list-item-title v-html="data.item.name" />
          <v-list-item-subtitle v-html="data.item.category" />
        </v-list-item-content>
      </template>
    </template>
  </v-autocomplete>
</template>

<script>
export default {
  data: function () {
    return {
      loading: false,
      invoiceItems: [],
      searchLoading: false,
      searchItems: [],
      searchText: null,
      searchItem: null,
      searchDebounce: null
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
      if (!itemId) {
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
        .get('/api/items/search?q=' + v)
        .then(({ data }) => {
          this.searchItems = data
          this.searchLoading = false
        })
    }
  }
}
</script>
