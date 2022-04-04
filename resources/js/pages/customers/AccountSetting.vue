<template>
  <v-card>
    <v-tabs>
      <v-tab>
        <span
          aria-hidden="true"
          class="v-icon notranslate me-3 theme--light"
          style="font-size: 20px; height: 20px; width: 20px"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            role="img"
            aria-hidden="true"
            class="v-icon__svg"
            style="font-size: 20px; height: 20px; width: 20px"
          >
            <path
              d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M12,13C14.67,13 20,14.33 20,17V20H4V17C4,14.33 9.33,13 12,13M12,14.9C9.03,14.9 5.9,16.36 5.9,17V18.1H18.1V17C18.1,16.36 14.97,14.9 12,14.9Z"
            ></path></svg></span
        >Account</v-tab
      >
      <v-tab>Item Two</v-tab>
      <v-tab>Item Three</v-tab>
    </v-tabs>
    <v-card-text class="d-flex pa-10 mt-2">
      <div
        class="v-avatar me-6 rounded"
        style="height: 120px; min-width: 120px; width: 120px"
      >
        <v-img>
          <div
            class="v-image__image v-image__image--cover"
            style="
              background-image: url('https://demos.themeselection.com/materio-vuetify-vuejs-admin-template/demo-5/img/1.e2938115.png');
              background-position: center center;
            "
          ></div>
        </v-img>
      </div>
      <div>
        <v-btn class="me-3 mt-5 primary"> <span>Upload new photo</span></v-btn>
        <v-btn type="button" class="mt-5 v-btn v-btn--outlined error--text">
          <span> Reset </span>
        </v-btn>
        <p class="text-sm mt-5">Allowed JPG, GIF or PNG. Max size of 800K</p>
      </div>
    </v-card-text>
    <v-card-text>
      <v-form>
        <v-row>
          <v-col class="col-md-6 col-12">
            <v-text-field
              v-model="name"
              :error-messages="nameErrors"
              placeholder="SaadKamran"
              label="User Name"
              outlined
              dense
              required
            ></v-text-field>
          </v-col>
          <v-col class="col-md-6-12">
            <v-text-field
              v-model="name"
              :error-messages="nameErrors"
              placeholder="Saad Kamran"
              label="Name"
              outlined
              dense
              required
            ></v-text-field>
          </v-col>
          <v-col class="col-md-6 col-12">
            <v-text-field
              v-model="name"
              :error-messages="nameErrors"
              placeholder="Saad Kamran"
              label="Email"
              outlined
              dense
              required
            ></v-text-field>
          </v-col>
          <v-col class="col-md-6 col-12">
            <v-text-field
              v-model="name"
              :error-messages="nameErrors"
              placeholder="Admin"
              label="Role"
              dense
              outlined
              required
            ></v-text-field>
          </v-col>
          <v-col class="col-md-6 col-12">
            <v-select
              v-model="name"
              :error-messages="nameErrors"
              placeholder="Active"
              label="Status"
              outlined
              dense
              required
            ></v-select>
          </v-col>
          <v-col class="col-md-6 col-12">
            <v-text-field
              v-model="name"
              :error-messages="nameErrors"
              placeholder="Google,inc"
              label="Company"
              dense
              outlined
              required
            ></v-text-field>
          </v-col>
          <v-col class="col col-12">
            <v-alert class="pa-4" dense text icon="mdi-alert" type="warning">
              <strong
                >Your email is not confirmed. Please check your inbox.</strong
              >
              <br />
              Resend Confirmation
            </v-alert>
          </v-col>
          <v-col class="col col-12">
            <v-btn class="me-3 mt-4 theme--light primary">
              Save Changes
            </v-btn>
            <v-btn class="mt-4  theme--light" color="grey" outlined>
              Cancel
            </v-btn>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>
  </v-card>
</template>
<script>
export default {};
</script>

<style>
</style>