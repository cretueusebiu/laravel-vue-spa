<template>
  <label class="custom-control custom-checkbox">
    <input
      type="checkbox"
      :name="name"
      @click="handleClick"
      :checked="internalValue"
      class="custom-control-input"
    >
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description">
      <slot></slot>
    </span>
  </label>
</template>

<script>
export default {
  name: 'Checkbox',

  props: {
    name: String,
    value: Boolean,
    checked: Boolean
  },

  data: () => ({
    internalValue: false
  }),

  created () {
    this.internalValue = this.value

    if ('checked' in this.$options.propsData) {
      this.internalValue = this.checked
    }
  },

  watch: {
    value (val) {
      this.internalValue = val
    },

    checked (val) {
      this.internalValue = val
    },

    internalValue (val, oldVal) {
      if (val !== oldVal) {
        this.$emit('input', val)
      }
    }
  },

  methods: {
    handleClick (e) {
      this.$emit('click', e)

      if (!e.isPropagationStopped) {
        this.internalValue = e.target.checked
      }
    }
  }
}
</script>
