<template>
  <main-layout>
    <card :title="$t('home')">
      {{ $t('you_are_logged_in') }}
    </card>
  </main-layout>
</template>

<script>
export default {
  // middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
