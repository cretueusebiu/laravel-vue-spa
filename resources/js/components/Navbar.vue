<template>
  <div>
    <v-app-bar
      app
      color="white"
      flat
    >
      <v-container class="py-0 fill-height">
        <v-avatar
          class="mr-10"
          color="grey darken-1"
          size="32"
        />

        <v-btn v-if="user" to="/home" text>
          Dashboard
        </v-btn>
        <v-btn v-if="user" :to="{ name: 'customers' }" text>
          Customers
        </v-btn>
        <v-btn v-if="user" :to="{ name: 'suppliers' }" text>
          Suppliers
        </v-btn>
        <v-btn v-if="user" :to="{ name: 'employees' }" text>
          Employees
        </v-btn>
        <v-btn v-if="user" :to="{ name: 'items' }" text>
          Items
        </v-btn>
        <v-btn v-if="user" :to="{ name: 'sales' }" text>
          Sales
        </v-btn>

        <v-spacer />
        <v-btn v-if="user" text @click.prevent="logout">
          {{ $t('logout') }}
        </v-btn>
      </v-container>
    </v-app-bar>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleDropdown from './LocaleDropdown'

export default {
  components: {
    LocaleDropdown
  },

  data: () => ({
    appName: window.config.appName
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
