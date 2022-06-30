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
        <v-btn v-if="user"
          type="button"           
          to="/home"
          class="text-capitalize text-base font-weight-regular px-6 v-btn v-btn--has-bg v-btn--rounded theme--light v-size--large primary bg-gradient-primary group-activator-active v-btn--active" 
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


        <span v-on:click="toggleDropdown" class="v-badge ms-4 v-badge--bottom v-badge--dot v-badge--overlap theme--light">
          <div class="v-avatar v-avatar-light-bg primary--text primary" role="button" aria-haspopup="true" aria-expanded="false" style="height: 40px; min-width: 40px; width: 40px;">
            <div class="v-image v-responsive theme--light">
              <div class="v-responsive__sizer" style="padding-bottom: 100%;"></div>
              <div class="v-image__image v-image__image--cover" style="background-image: url(&quot;https://demos.themeselection.com/materio-vuetify-vuejs-admin-template/demo-5/img/1.e2938115.png&quot;); background-position: center center;"></div>
              <div class="v-responsive__content" style="width: 200px;"></div>
            </div>
          </div>
            <span class="v-badge__wrapper">
              <span aria-atomic="true" aria-label="Badge" aria-live="polite" role="status" class="v-badge__badge success" style="inset: calc(100% - 12px) auto auto calc(100% - 12px);">
              </span>
            </span>
        </span>

        <div role="menu" v-if="isDropdownOpen" class="v-menu__content theme--light v-menu__content--fixed menuable__content__active user-profile-menu-content" style="min-width: 230px; top: 12px; left: 1071px; transform-origin: left top; z-index: 9;">
          <div class="v-list v-sheet theme--light">
            <div class="pb-3 pt-2">
              <span class="v-badge ms-4 v-badge--bottom v-badge--dot v-badge--overlap theme--light">
                <div class="v-avatar v-avatar-light-bg primary--text primary" style="height: 40px; min-width: 40px; width: 40px;">
                  <div class="v-image v-responsive theme--light">
                    <div class="v-responsive__sizer" style="padding-bottom: 100%;"></div>
                    <div class="v-image__image v-image__image--cover" style="background-image: url(&quot;https://demos.themeselection.com/materio-vuetify-vuejs-admin-template/demo-5/img/1.e2938115.png&quot;); background-position: center center;"></div>
                    <div class="v-responsive__content" style="width: 200px;"></div>
                  </div>
                </div>
                <span class="v-badge__wrapper">
                  <span aria-atomic="true" aria-label="Badge" aria-live="polite" role="status" class="v-badge__badge success" style="inset: calc(100% - 12px) auto auto calc(100% - 12px);">
                  </span>
                </span>
              </span>
              <div class="d-inline-flex flex-column justify-center ms-3" style="vertical-align: middle;"><span class="text--primary font-weight-semibold mb-n1"> John Doe </span><small class="text--disabled text-capitalize">admin</small></div>
            </div>
            <hr role="separator" aria-orientation="horizontal" class="v-divider theme--light">
            <a href="/materio-vuetify-vuejs-admin-template/demo-5/apps/user/view/21" class="v-list-item v-list-item--link theme--light" tabindex="0" role="menuitem" id="list-item-383">
              <div class="v-list-item__icon me-2">
                <span aria-hidden="true" class="v-icon notranslate theme--light" style="font-size: 22px; height: 22px; width: 22px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" class="v-icon__svg" style="font-size: 22px; height: 22px; width: 22px;">
                    <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M12,13C14.67,13 20,14.33 20,17V20H4V17C4,14.33 9.33,13 12,13M12,14.9C9.03,14.9 5.9,16.36 5.9,17V18.1H18.1V17C18.1,16.36 14.97,14.9 12,14.9Z"></path>
                  </svg>
                </span>
              </div>
              <div class="v-list-item__content">
                <div class="v-list-item__title">Profile</div>
              </div>
            </a>
            <a href="/materio-vuetify-vuejs-admin-template/demo-5/pages/account-settings" class="v-list-item v-list-item--link theme--light" tabindex="0" role="menuitem" id="list-item-395">
              <div class="v-list-item__icon me-2">
                <span aria-hidden="true" class="v-icon notranslate theme--light" style="font-size: 22px; height: 22px; width: 22px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" class="v-icon__svg" style="font-size: 22px; height: 22px; width: 22px;">
                    <path d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"></path>
                  </svg>
                </span>
              </div>
              <div class="v-list-item__content">
                <div class="v-list-item__title">Settings</div>
              </div>
            </a>
            <div tabindex="0" role="menuitem" id="list-item-405" class="v-list-item v-list-item--link theme--light">
              <div class="v-list-item__icon me-2">
                <span aria-hidden="true" class="v-icon notranslate theme--light" style="font-size: 22px; height: 22px; width: 22px;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-hidden="true" class="v-icon__svg" style="font-size: 22px; height: 22px; width: 22px;">
                    <path d="M14.08,15.59L16.67,13H7V11H16.67L14.08,8.41L15.5,7L20.5,12L15.5,17L14.08,15.59M19,3A2,2 0 0,1 21,5V9.67L19,7.67V5H5V19H19V16.33L21,14.33V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19Z"></path>
                  </svg>
                </span>
              </div>
              <div class="v-list-item__content">
                <div class="v-list-item__title " v-if="user" text @click.prevent="logout">{{ $t('logout') }}</div>
              </div>
            </div>
          </div>
        </div>
        





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
        <!-- <v-btn v-if="user" text @click.prevent="logout">
          {{ $t('logout') }}
        </v-btn> -->
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
      isDropdownOpen:false
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
    },
    toggleDropdown(){
      this.isDropdownOpen=!this.isDropdownOpen
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
.v-btn--active{
color:#2b81d6;
}
.user-profile-menu-content{
  margin-top:50px;
}
</style>
