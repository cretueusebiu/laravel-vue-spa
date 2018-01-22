<template>
  <main-layout>
    <div class="text-center">
      <h2 class="mb-4">{{ $t('page_not_found') }}</h2>

      <div class="links">
        <router-link :to="{ name: 'welcome' }">
          {{ $t('go_home') }}
        </router-link>
      </div>
    </div>
  </main-layout>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
