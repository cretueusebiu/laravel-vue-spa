<template>
  <div class="custom-control custom-checkbox">
    <input
      type="checkbox"
      :name="name"
      @click="handleClick"
      :checked="internalValue"
      class="custom-control-input"
      :id="id || name || 'checkbox'"
    >
    <label class="custom-control-label" :for="id || name || 'checkbox'">
      <slot></slot>
    </label>
  </div>
</template>

<script>
export default {
  name: 'Checkbox',

  props: {
    id: String,
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
