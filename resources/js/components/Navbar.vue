<template>
  <div>
    <v-app-bar
      app
      color="white"
      flat
    >
      <v-container class="py-0 fill-height">
        <!-- <v-avatar
          class="mr-10"
          color="grey darken-1"
          size="32"
        /> -->
        <v-menu
        open-on-click
        top
        offset-y
        >
          <template v-slot:activator="{ on, attrs }">
            <v-avatar
            class="mr-10"
            color="grey darken-1"
            size="32"
            v-bind="attrs"
            v-on="on"
            />
          </template>

          <v-list>
            <v-list-item
              v-for="(item, index) in items"
              :key="index"
            >
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
        <v-btn v-if="user"
          type="button"           
          to="/home"
          class="text-capitalize text-base font-weight-regular px-6 v-btn v-btn--has-bg v-btn--rounded theme--light v-size--large primary bg-gradient-primary group-activator-active" 
          role="button"
          >
            <span
            class="v-btn__content"
            >
              <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
                <svg xmlns="http://www.w3.org/2000/svg" 
                  viewBox="0 0 24 24" 
                  role="img" 
                  aria-hidden="true" 
                  class="v-icon__svg" 
                  style="font-size: 22px; 
                  height: 22px; 
                  width: 22px;">
                  <path d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69M12 3L2 12H5V20H11V14H13V20H19V12H22L12 3Z"></path>
                </svg>
              </span>
              <span>Dashboard</span>
            </span>
        </v-btn>
        <v-btn text
          v-if="user" 
          :to="{ name: 'customers' }" 
          type="button" 
          class="text-capitalize text-base font-weight-regular px-6 no-background v-btn--has-bg v-btn--rounded theme--light v-size--large transparent" role="button" aria-haspopup="true" aria-expanded="false"
          >
          <span 
            class="v-btn__content"
            >
            <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                role="img" 
                aria-hidden="true" 
                class="v-icon__svg" 
                style="font-size: 22px; 
                height: 22px; width: 22px;"
                >
                <path 
                  d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L10.11,5.22L16,8.61L17.96,7.5L12,4.15M6.04,7.5L12,10.85L13.96,9.75L8.08,6.35L6.04,7.5M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z"
                  >
                </path>
              </svg>
            </span>
            <span>Customers</span>
            <span 
              aria-hidden="true" 
              class="v-icon notranslate theme--light" 
              style="font-size: 20px; height: 20px; width: 20px;"
              >
            </span>
          </span>
        </v-btn>
        <v-btn text
          v-if="user" 
          :to="{ name: 'suppliers' }" 
          type="button" 
          class="text-capitalize text-base font-weight-regular px-6 no-background v-btn--has-bg v-btn--rounded theme--light v-size--large transparent" role="button" aria-haspopup="true" aria-expanded="false"
          >
          <span 
            class="v-btn__content"
            >
            <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                role="img" 
                aria-hidden="true" 
                class="v-icon__svg" 
                style="font-size: 22px; 
                height: 22px; width: 22px;"
                >
                <path 
                  d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L10.11,5.22L16,8.61L17.96,7.5L12,4.15M6.04,7.5L12,10.85L13.96,9.75L8.08,6.35L6.04,7.5M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z"
                  >
                </path>
              </svg>
            </span>
            <span>Suppliers</span>
            <span 
              aria-hidden="true" 
              class="v-icon notranslate theme--light" 
              style="font-size: 20px; height: 20px; width: 20px;"
              >
            </span>
          </span>
        </v-btn>
        <v-btn text
          v-if="user" 
          :to="{ name: 'employees' }" 
          type="button" 
          class="text-capitalize text-base font-weight-regular px-6 no-background v-btn--has-bg v-btn--rounded theme--light v-size--large transparent" role="button" aria-haspopup="true" aria-expanded="false"
          >
          <span 
            class="v-btn__content"
            >
            <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                role="img" 
                aria-hidden="true" 
                class="v-icon__svg" 
                style="font-size: 22px; 
                height: 22px; width: 22px;"
                >
                <path 
                  d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L10.11,5.22L16,8.61L17.96,7.5L12,4.15M6.04,7.5L12,10.85L13.96,9.75L8.08,6.35L6.04,7.5M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z"
                  >
                </path>
              </svg>
            </span>
            <span>Employees</span>
            <span 
              aria-hidden="true" 
              class="v-icon notranslate theme--light" 
              style="font-size: 20px; height: 20px; width: 20px;"
              >
            </span>
          </span>
        </v-btn>
        <v-btn text
          v-if="user" 
          :to="{ name: 'items' }" 
          type="button" 
          class="text-capitalize text-base font-weight-regular px-6 no-background v-btn--has-bg v-btn--rounded theme--light v-size--large transparent" role="button" aria-haspopup="true" aria-expanded="false"
          >
          <span 
            class="v-btn__content"
            >
            <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                role="img" 
                aria-hidden="true" 
                class="v-icon__svg" 
                style="font-size: 22px; 
                height: 22px; width: 22px;"
                >
                <path 
                  d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L10.11,5.22L16,8.61L17.96,7.5L12,4.15M6.04,7.5L12,10.85L13.96,9.75L8.08,6.35L6.04,7.5M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z"
                  >
                </path>
              </svg>
            </span>
            <span>Items</span>
            <span 
              aria-hidden="true" 
              class="v-icon notranslate theme--light" 
              style="font-size: 20px; height: 20px; width: 20px;"
              >
            </span>
          </span>
        </v-btn>
        <v-btn text
          v-if="user" 
          :to="{ name: 'sales' }" 
          type="button" 
          class="text-capitalize text-base font-weight-regular px-6 no-background v-btn--has-bg v-btn--rounded theme--light v-size--large transparent" role="button" aria-haspopup="true" aria-expanded="false"
          >
          <span 
            class="v-btn__content"
            >
            <span 
              aria-hidden="true" 
              class="v-icon notranslate v-icon--left theme--dark" 
              style="font-size: 22px; height: 22px; width: 22px;"
              >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                role="img" 
                aria-hidden="true" 
                class="v-icon__svg" 
                style="font-size: 22px; 
                height: 22px; width: 22px;"
                >
                <path 
                  d="M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L10.11,5.22L16,8.61L17.96,7.5L12,4.15M6.04,7.5L12,10.85L13.96,9.75L8.08,6.35L6.04,7.5M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V9.21L13,12.58V19.29L19,15.91Z"
                  >
                </path>
              </svg>
            </span>
            <span>Sales</span>
            <span 
              aria-hidden="true" 
              class="v-icon notranslate theme--light" 
              style="font-size: 20px; height: 20px; width: 20px;"
              >
            </span>
          </span>
        </v-btn>
        <!-- <v-btn v-if="user" :to="{ name: 'suppliers' }" text>
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
        </v-btn> -->

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
    appName: window.config.appName,
    items: [
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me' },
        { title: 'Click Me 2' },
      ],
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
