<template>
  <div>
    <navbar />
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col>
            <v-sheet
              min-height="80vh"
              rounded="lg"
            >
              <child />
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
    <v-snackbar
      v-model="showSnackbar"
      color="success"
    >
      {{ snackbarText }}
      <template #action="{ attrs }">
        <v-btn
          text
          v-bind="attrs"
          @click="$store.dispatch('snackbar/hideMessage')"
        >
          Close
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  components: {
    Navbar
  },
  computed: {
    showSnackbar () {
      return !!this.$store.getters['snackbar/snackbarText']
    },
    snackbarText () {
      return this.$store.getters['snackbar/snackbarText']
    }
  }
}
</script>

<style>
.center-box{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>
