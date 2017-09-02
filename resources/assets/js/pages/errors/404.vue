<template>
  <div class="text-center">
    <h2 class="mb-4">{{ $t('page_not_found') }}</h2>

    <div class="links">
      <router-link :to="{ name: 'welcome' }">
        {{ $t('go_home') }}
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'not-found',

  layout: 'default'
}
</script>
