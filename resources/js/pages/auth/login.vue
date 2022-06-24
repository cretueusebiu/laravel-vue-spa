<template>
  <v-app>
    <!-- <v-sheet rounded class="m-auto pa-8 ml-4 loginBox" elevation="10" >
    <v-form @submit.prevent="login" @keydown="form.onKeydown($event)">
      <v-text-field
        v-model="form.email"
        :error-messages="form.errors.get('email')"
        :label="$t('email')"
        required
      />
      <v-text-field
        v-model="form.password"
        :error-messages="form.errors.get('password')"
        :label="$t('password')"
        type="password"
        required
      />
      <v-btn type="submit" color="primary" :loading="form.busy" class="mt-4">
        {{ $t("login") }}
      </v-btn>

      <div v-if="config.env != 'production'" class="my-4">
        <div style="cursor: pointer" @click="fillWithAdmin">
          email: admin@example.com<br />
          password: 123456
        </div>
      </div>
    </v-form>
  </v-sheet> -->
    <v-container fluid class="py-0 px-0">
      <v-row>
        <v-col sm="8" class="left-div">
          <v-card-title class="text-primary title">LOSPOS</v-card-title>
          <v-img
            class="img-login"
            lazy-src="../../public/assets/images/login.png"
            max-height="100%"
            max-width="100%"
            src="https://demos.themeselection.com/materio-vuetify-vuejs-admin-template/demo-5/img/group-light.24472a63.png"
          ></v-img>
        </v-col>
        <v-col sm="4">
          <v-card
            height="100%"
            width="100%"
            class="ml-auto pt-16 pl-6 pr-6"
          >
            <v-card-title><div class="ml-1 mt-6 text-primary">Welcome!</div></v-card-title>
            <v-form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <v-card-text>
                <v-text-field
                  class="pt-4"
                  outlined
                  prepend-icon="mdi-account-circle"
                  v-model="form.email"
                  :error-messages="form.errors.get('email')"
                  :label="$t('email')"
                  required
                ></v-text-field>
                <v-text-field
                  class="pt-4"
                  outlined
                  prepend-icon="mdi-lock"
                  v-model="form.password"
                  :error-messages="form.errors.get('password')"
                  :label="$t('password')"
                  type="password"
                  required
                ></v-text-field>
              </v-card-text>
              <v-divider></v-divider>
              <v-checkbox label="Remember me" class="ml-4"></v-checkbox>
              <v-card-actions>
                <v-btn class="pt-4 pb-4" block type="submit" color="primary" :loading="form.busy">{{ $t("login") }}</v-btn>
              </v-card-actions>
            </v-form>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>

<script>
import Form from "vform";
import Cookies from "js-cookie";
import LoginWithGithub from "~/components/LoginWithGithub";

export default {
  components: {
    LoginWithGithub
  },
  layout: "basic",

  middleware: "guest",

  metaInfo() {
    return { title: this.$t("login") };
  },

  data: () => ({
    form: new Form({
      email: "",
      password: ""
    }),
    config: window.config,
    remember: false
  }),

  methods: {
    async login() {
      try {
        // Submit the form.
        const { data } = await this.form.post("/api/login");

        // Save the token.
        this.$store.dispatch("auth/saveToken", {
          token: data.token,
          remember: this.remember
        });

        // Fetch the user.
        await this.$store.dispatch("auth/fetchUser");

        // Redirect home.
        this.redirect();
      } catch (ex) {
        console.log(ex);
      }
    },

    redirect() {
      const intendedUrl = Cookies.get("intended_url");

      if (intendedUrl) {
        Cookies.remove("intended_url");
        this.$router.push({ path: intendedUrl });
      } else {
        this.$router.push({ name: "home" });
      }
    },

    fillWithAdmin() {
      this.form.fill({
        email: "admin@example.com",
        password: "123456"
      });
    }
  }
};
</script>

<style scoped>
.loginBox {
  transform: translateY(50%);
}
.main{
  width:100%;
}
.img-login{
  width:90%;
  margin-left:50px;
}
.text-primary{
  font-weight: 700px;
  color: rgba(94,86,105,.68)!important;
  font-size:22px;
}
.title{
  margin-left:40px;
}
.left-div{
  background-color:#f5f5f5;
}
.col-sm-4{
  padding:0px;
}
@media screen and (max-width: 600px) {
  .left-div {
    visibility: hidden;
    clear: both;
    float: left;
    margin: 10px auto 5px 20px;
    width: 28%;
    display: none;
  }
}
</style>