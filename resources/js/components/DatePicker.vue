<template>
  <v-menu
    v-model="popupModal"
    :close-on-content-click="false"
    :nudge-right="40"
    transition="scale-transition"
    offset-y
    min-width="auto"
  >
    <template #activator="{ on, attrs }">
      <v-text-field
        v-model="currentValue"
        :error-messages="errorMessage"
        label="Sale Date"
        prepend-icon="mdi-calendar"
        readonly
        v-bind="attrs"
        v-on="on"
      />
    </template>
    <v-date-picker
      v-model="currentValue"
      scrollable
      @input="handleInput"
    />
  </v-menu>
</template>

<script>
export default {
  props: ['value', 'errorMessage'],
  data: function () {
    return {
      popupModal: false,
      currentValue: this.value
    }
  },
  methods: {
    handleInput () {
      this.$emit('input', this.currentValue)
      this.popupModal = false
    }
  }
}
</script>
