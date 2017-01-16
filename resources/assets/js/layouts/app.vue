<template>
  <div>
    <nav class="navbar navbar-toggleable-md navbar-light mb-4">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <router-link :to="{ name: 'welcome' }" class="navbar-brand">Laravel</router-link>

        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li> -->
          </ul>
          <ul class="navbar-nav">
            <router-link :to="{ name: 'auth.login' }" tag="li" class="nav-item" active-class="active">
              <a class="nav-link">Login</a>
            </router-link>
            <router-link :to="{ name: 'auth.register' }" tag="li" class="nav-item" active-class="active">
              <a class="nav-link">Register</a>
            </router-link>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <LayoutContent/>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  computed: mapGetters({
    authenticated: 'authCheck'
  })
}
</script>
