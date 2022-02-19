<template>
  <div class="row">
    <div class="col-lg-10 m-auto">
      <card :title="$t('home')">
        <h3><center>Please Choose An Option:</center></h3>
        <div class="d-flex justify-content-center">
          <router-link
            :to="{ name: 'note' }"
            class="w-30 text-center bg-primary p-4 m-4"
          >
            <center><h4 class="text-white">Note Express</h4></center>
          </router-link>
          <router-link
            :to="{ name: 'rate' }"
            class="w-30 text-center bg-primary p-4 m-4"
          >
            <center><h4 class="text-white">Rate Express</h4></center>
          </router-link>
        </div>
      </card>
    </div>
  </div>
</template>

<script>
// import axios from 'axios'
export default {
  middleware: "auth",

  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo() {
    return { title: this.$t("home") };
  }
};
</script>
