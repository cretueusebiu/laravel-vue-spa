<template>
  <a v-if="githubAuth" href="/oauth/github" class="btn btn-dark ml-auto">
    {{ $t('login_with') }}
    <fa :icon="['fab', 'github']"/>
  </a>
</template>

<script>
export default {
  name: 'LoginWithGithub',

  computed: {
    githubAuth: () => window.config.githubAuth
  }
}
</script>
