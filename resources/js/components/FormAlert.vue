<template>
  <v-alert v-if="form.errors.any()" type="error">
    <span v-if="form.errorMessage">{{ form.errorMessage }}</span>
    <span v-else-if="form.errors.get('error')">{{ form.errors.get('error') }}</span>
    <span v-else>There were some problems with your input.</span>
  </v-alert>
</template>

<script>
export default {
  props: ['form']
}
</script>
