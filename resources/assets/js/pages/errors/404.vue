<template>
  <div class="text-center">
    <h1 class="mb-4">Page Not Found</h1>

    <div class="links">
      <router-link :to="{ name: 'welcome' }">Go Home</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'not-found',

  layout: 'default'
}
</script>
