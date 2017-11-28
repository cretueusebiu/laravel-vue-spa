<template>
  <div class="text-center">
    <h2 class="mb-4">{{ $t('unauthorized') }}</h2>

    <div class="links">
      <router-link :to="{ name: 'welcome' }">
        {{ $t('go_home') }}
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'unauthorized',

  layout: 'default'
}
</script>
