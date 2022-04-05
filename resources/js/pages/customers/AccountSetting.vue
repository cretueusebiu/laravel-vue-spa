<template>
  <v-card>
    <v-tabs>
      <v-tab>ACCOUNT</v-tab>
      <v-tab>BILLING</v-tab>
      <v-tab>Item Three</v-tab>

      <v-tab-item v-for="n in 3" :key="n">
        <v-col  v-if="n == 1">
          <v-card-text  class="d-flex pa-10 mt-2">
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
              <v-btn class="me-3 mt-5 primary">
                <span>Upload new photo</span></v-btn
              >
              <v-btn
                type="button"
                class="mt-5 v-btn v-btn--outlined error--text"
              >
                <span> Reset </span>
              </v-btn>
              <p class="text-sm mt-5">
                Allowed JPG, GIF or PNG. Max size of 800K
              </p>
            </div>
          </v-card-text>
          <v-card-text>
            <v-form>
              <v-row dense>
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
                  <v-alert
                    class="pa-4"
                    dense
                    text
                    icon="mdi-alert"
                    type="warning"
                  >
                    <strong
                      >Your email is not confirmed. Please check your
                      inbox.</strong
                    >
                    <br />
                    Resend Confirmation
                  </v-alert>
                </v-col>
                <v-col class="col col-12">
                  <v-btn class="me-3 mt-4 theme--light primary">
                    Save Changes
                  </v-btn>
                  <v-btn class="mt-4 theme--light" color="grey" outlined>
                    Cancel
                  </v-btn>
                </v-col>
              </v-row>
            </v-form>
          </v-card-text>
        </v-col>
        <v-col v-if="n == 2">
          <v-form class="pa-5">
            <v-row>
              <v-col class="col-sm-6 col-md-8 col-12">
                <v-row>
                  <v-col class="col col-12 pa-0">
                    <span class="pa-2">Payments methods</span>
                    <v-radio-group v-model="row" row>
                      <v-radio
                        label="Credit/Debit/ATM Card"
                        value="radio-1"
                      ></v-radio>
                      <v-radio label="COD/Cheque" value="radio-2"></v-radio>
                    </v-radio-group>
                  </v-col>
                  <v-col class="col col-12 pa-0">
                    <v-text-field
                      label="name"
                      placeholder="Saad Kamran"
                      outlined
                      dense
                    ></v-text-field>
                  </v-col>
                  <v-col class="col col-12 pa-0">
                    <v-text-field
                      dense
                      outlined
                      label="Card Number"
                      placeholder="13563 21565 48789"
                    ></v-text-field>
                  </v-col>
                  <v-col class="me-2 col-md-4 col-6 pa-0">
                    <v-text-field
                      dense
                      outlined
                      label="Expiry Date"
                      placeholder="0524"
                    ></v-text-field>
                  </v-col>
                  <v-col class="col-md-4 col-6 pa-0">
                    <v-text-field
                      outlined
                      dense
                      type="password"
                      placeholder="6789"
                      label="CVV Code"
                    ></v-text-field>
                  </v-col>
                  <v-col class="col col-12 mb-5 pa-0">
                    <v-btn class="me-2 theme--light primary">
                      Save Changes
                    </v-btn>
                    <v-btn class=" theme--light" color="grey" outlined>
                      Cancel
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
              <v-col class="col-sm-6 col-md-4 col-12">
                <v-card outlined>
                  <v-card-text>
                    <v-checkbox
                      v-model="ex4"
                      label="Your current plan"
                      color="indigo"
                      value="indigo"
                      dense
                      hide-details
                    ></v-checkbox>
                    <v-chip
                      color="purple lighten-4 font-weight-medium mt-4"
                      text-color="purple"
                      x-small
                      >Basic Plan</v-chip
                    >
                    <v-list dense>
                      <v-list-item class="pa-0" dense>
                        <v-list-item-icon class="me-3">
                          <v-icon>mdi-account-outline</v-icon>
                        </v-list-item-icon>
                        5 Users
                      </v-list-item>
                      <v-list-item class="pa-0" dense>
                        <v-list-item-icon class="me-3">
                          <v-icon>mdi-cloud-outline</v-icon>
                        </v-list-item-icon>
                        10 GB storage
                      </v-list-item>
                      <v-list-item class="pa-0" dense>
                        <v-list-item-icon class="me-3">
                          <v-icon>mdi-help-circle-outline</v-icon>
                        </v-list-item-icon>
                        Basic Support
                      </v-list-item>
                    </v-list>
                    <v-btn small class="col col-12 primary">Upgrade Plan</v-btn>
                  </v-card-text>
                </v-card>
              </v-col>
            </v-row>
          </v-form>
        </v-col>
        <v-col v-if="n == 3">tabe 3</v-col>
      </v-tab-item>
    </v-tabs>
  </v-card>
</template>
<script>
export default {};
</script>

<style>
</style>