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
    <v-container>
      <v-row>
        <v-col sm="6"> </v-col>
        <v-col sm="6">
          <v-card
            elevation="10"
            height="670px"
            width="350px"
            class="ml-auto pt-16"
          >
            <v-card-title><div class="ml-1 mt-5">Welcome!</div></v-card-title>
            <v-form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <v-card-text>
                <v-text-field
                  outlined
                  prepend-icon="mdi-account-circle"
                  v-model="form.email"
                  :error-messages="form.errors.get('email')"
                  :label="$t('email')"
                  required
                ></v-text-field>
                <v-text-field
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
                <v-btn block type="submit" color="primary" :loading="form.busy">{{ $t("login") }}</v-btn>
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
</style>
