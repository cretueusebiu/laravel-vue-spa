<template>
  <v-row>
    <div class="col-md-9 col-12">
      <div class="v-card v-sheet theme--light">
        <v-card-title class="d-flex justify-space-between">
          <div class="mb-6">
            <div class="d-flex align-center mb-6">
              <div
                aria-label="logo"
                role="img"
                class="v-image v-responsive me-3 theme--light"
                style="max-height: 30px; max-width: 30px"
              >
                <div
                  class="v-responsive__sizer"
                  style="padding-bottom: 83.3333%"
                ></div>
                <div
                  class="v-image__image v-image__image--contain"
                  style="
                    background-image: url('https://demos.themeselection.com/materio-vuetify-vuejs-admin-template/demo-5/img/logo.00580c88.svg');
                    background-position: center center;
                  "
                ></div>
                <div class="v-responsive__content" style="width: 30px"></div>
              </div>
              <span class="text--primary font-weight-bold text-xl">
                MATERIO
              </span>
            </div>
            <span class="d-block font-weight-light body-2"
              >Office 149, 450 South Brand Brooklyn</span
            ><span class="d-block font-weight-light body-2"
              >San Diego County, CA 91905, USA</span
            ><span class="d-block font-weight-light body-2"
              >+1 (123) 456 7891, +44 (876) 543 2198</span
            >
          </div>
          <div class="text-right">
            <div class="mb-4 d-flex align-center justify-end">
              <span class="me-2 font-weight-medium text-xl text--primary"
                >Invoice
              </span>
              <span>#5036</span>
            </div>
            <div class="d-flex justify-end">
              <span class="ma-2 body-2 font-weight-light text--gray"
                >Date Issued:
              </span>
              <span class="ma-2 body-2 font-weight-medium text--gray"
                >2019-04-19</span
              >
            </div>
            <div class="d-flex justify-end">
              <span class="ma-2 font-weight-light body-2">Due Date: </span>
              <span class="ma-2 body-2 font-weight-medium text--gray"
                >2019-09-25</span
              >
            </div>
          </div>
        </v-card-title>

        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <v-card-text class="py-9 px-8">
          <div
            class="
              d-flex
              justify-space-between
              flex-wrap flex-column flex-sm-row
            "
          >
            <div>
              <p class="font-weight-semibold payment-details-header">
                Invoice To:
              </p>
              <table>
                <tr>
                  <td class="pe-6">Andrew Burns</td>
                </tr>
                <tr>
                  <td class="pe-6">Richardson and Sons LLC</td>
                </tr>
                <tr>
                  <td class="pe-6">78083 Laura Pines, Bhutan</td>
                </tr>
                <tr>
                  <td class="pe-6">(687) 660-2473</td>
                </tr>
                <tr>
                  <td class="pe-6">pwillis@cross.org</td>
                </tr>
              </table>
            </div>
            <div>
              <p class="font-weight-semibold payment-details-header">
                Bill To:
              </p>
              <table>
                <tr>
                  <td class="pe-6">Total Due:</td>
                  <td>$12,110.55</td>
                </tr>
                <tr>
                  <td class="pe-6">Bank Name:</td>
                  <td>American Bank</td>
                </tr>
                <tr>
                  <td class="pe-6">Country:</td>
                  <td>United States</td>
                </tr>
                <tr>
                  <td class="pe-6">IBAN:</td>
                  <td>ETD95476213874685</td>
                </tr>
                <tr>
                  <td class="pe-6">SWIFT Code:</td>
                  <td>BR91905</td>
                </tr>
              </table>
            </div>
          </div>
        </v-card-text>
        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <div class="add-products-form pt-9 pb-10 px-8">
          <v-card>
            <v-data-table :headers="headers" :items="desserts"></v-data-table>
          </v-card>
        </div>
        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <v-card-text class="py-9 px-8">
          <div
            class="
              d-flex
              justify-space-between
              flex-wrap flex-column flex-sm-row
            "
          >
            <div class="mb-6 mb-sm-0">
              <div class="mb-4 d-flex align-center">
                <span class="font-weight-semibold me-2 mb-5">Salesperson:</span>
                <span class="font-weight-semibold me-2 mb-5">Jenny Parker</span>
              </div>
              <span class="font-weight-semibold me-2 mb-5"
                >Thanks for your business</span
              >
            </div>
            <div>
              <table class="w-full">
                <tr>
                  <td class="pe-16">Subtotal:</td>
                  <th class="text-right">$1800</th>
                </tr>
                <tr>
                  <td class="pe-16">Discount:</td>
                  <th class="text-right">$28</th>
                </tr>
                <tr>
                  <td class="pe-16">Tax:</td>
                  <th class="text-right">21%</th>
                </tr>
              </table>
              <hr
                role="separator"
                aria-orientation="horizontal"
                class="mt-4 mb-3 v-divider theme--light"
              />
              <table class="w-full">
                <tr>
                  <td class="pe-16">Total:</td>
                  <th class="text-right">$1690</th>
                </tr>
              </table>
            </div>
          </div>
        </v-card-text>
        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <div class="v-card__text px-8 py-6">
          <div class="mb-0">
            <p class="font-weight-semibold">Note:</p>
            <span class="font-weight-light caption"
              >It was a pleasure working with you and your team. We hope you
              will keep us in mind for future freelance projects. Thank
              You!</span
            >
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-12">
      <div class="mb-6 v-card v-sheet theme--light">
        <div class="v-card__text">
          <v-btn class="mb-3 primary" block>
            <span>
              <v-icon small class="me-2 left theme--light">mdi-send</v-icon>
              <span>Send Invoice</span>
              </span>
          </v-btn>
          <v-btn class="mb-3" outlined block color="grey">DOWNLOAD</v-btn>
          <v-btn class="mb-3" outlined block color="grey">PRINT</v-btn>
          <v-btn class="mb-3" outlined block color="grey">EDIT INVOICE</v-btn>
          <v-btn class="mb-3" block color="success">
              <v-icon small class="me-2 left theme--light">mdi-currency-usd</v-icon>
              <span>Send Invoice</span>
          </v-btn>
        </div>
      </div>
    </div>
  </v-row>
</template>

<script>
export default {
  data() {
    return {
      select: { state: "Florida", abbr: "FL" },
      items: [
        { state: "Florida", abbr: "FL" },
        { state: "Georgia", abbr: "GA" },
        { state: "Nebraska", abbr: "NE" },
        { state: "California", abbr: "CA" },
        { state: "New York", abbr: "NY" },
      ],
    };
  },
  data() {
    return {
      headers: [
        {
          text: "ITEM",
          align: "start",
          sortable: false,
          value: "name",
        },
        { text: "DESCRIPTION", value: "calories" },
        { text: "COST", value: "fat" },
        { text: "HOURS", value: "carbs" },
        { text: "PRICE", value: "protein" },
      ],
      desserts: [
        {
          name: "Donut",
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: "22%",
        },
        {
          name: "KitKat",
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: "6%",
        },
      ],
    };
  },
};
</script>

<style>
</style>