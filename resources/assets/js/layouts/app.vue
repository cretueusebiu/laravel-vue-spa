<template>
  <div class="app-layout">
    <navbar></navbar>

    <div class="mt-4" v-bind:class="[fluidOrNotFluid]">
      <child/>
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'app-layout',
  components: {
    Navbar
  },
  data()
  {
     return {
          // default container classname
          fluidOrNotFluid: 'container',
          // pages, that non fluid design
          nonFluidPages  : [
              'home',
              'settings',
              'settings.profile',
              'settings.password',
              'login',
              'register',
              'password.reset',
              'password.email',
          ]
     }
  },
  created()
  {
      this.refreshFluidorNotFluidClassName()
  },
  watch     : {
      '$route': 'refreshFluidorNotFluidClassName'
  },
  methods   : {
      refreshFluidorNotFluidClassName()
      {
          // overriding the class name depends on page name (see ../router/routes.js)
          this.className = 'container';
          if ( this.nonFluidPages.indexOf( this.$route.name ) < 0 )
          {
              this.className = 'container-fluid';
          }
      }
  }
}
</script>
