<template>
  <main-layout>
    <card class="text-center">
      <h3 class="mb-4">{{ $t('page_not_found') }}</h3>

      <div class="links">
        <router-link :to="{ name: 'welcome' }">
          {{ $t('go_home') }}
        </router-link>
      </div>
    </card>
  </main-layout>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>
