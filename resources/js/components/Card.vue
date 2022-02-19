<template>
  <div class="w-100 bg-white">
    <div class="card-body bg-white">
      <slot />
    </div>
  </div>
</template>

<script>
export default {
  name: "Card",

  props: {
    title: { type: String, default: null }
  }
};
</script>
