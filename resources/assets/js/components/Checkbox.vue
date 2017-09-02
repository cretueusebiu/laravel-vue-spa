<template>
  <label class="custom-control custom-checkbox">
    <input v-model="internalValue" type="checkbox" :name="name" class="custom-control-input">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">
      <slot></slot>
    </span>
  </label>
</template>

<script>
export default {
  name: 'checkbox',

  props: ['value', 'name'],

  data: () => ({
    internalValue: false
  }),

  created () {
    this.internalValue = this.value
  },

  watch: {
    value (val) {
      if (this.internalValue !== val) {
        this.internalValue = val
      }
    },

    internalValue (val, oldVal) {
      if (val !== oldVal) {
        this.$emit('input', val)
      }
    }
  }
}
</script>
