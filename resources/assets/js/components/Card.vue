<template>
  <div class="card">
    <div v-if="title" class="card-header">
      {{ title }}
    </div>

    <div class="card-body">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'card',

  props: ['title']
}
</script>
