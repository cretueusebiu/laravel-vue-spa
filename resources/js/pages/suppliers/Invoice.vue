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
                >Invoice:</span
              >
              <v-text-field
                class="theme--light flex-grow-0"
                placeholder="5703"
                label="Id"
                required
                outlined
                dense
                hide-details="auto"
              />
            </div>
            <div class="d-flex justify-end">
              <span class="ma-2 body-2 font-weight-light text--gray"
                >Date Issued:
              </span>
              <v-menu
                v-model="menu1"
                :close-on-content-click="false"
                max-width="290"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    :value="computedDateFormattedMomentjs"
                    clearable
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    outlined
                    dense
                    @click:clear="date = null"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="date"
                  @change="menu2 = false"
                ></v-date-picker>
              </v-menu>
            </div>
            <div class="d-flex justify-end">
              <span class="ma-4 font-weight-light body-2">Due Date: </span>
              <v-menu
                v-model="menu1"
                :close-on-content-click="false"
                max-width="290"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    :value="computedDateFormattedMomentjs"
                    clearable
                    readonly
                    v-bind="attrs"
                    v-on="on"
                    outlined
                    dense
                    @click:clear="date = null"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="date"
                  @change="menu2 = false"
                ></v-date-picker>
              </v-menu>
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
            <div class="mb-6 mb-sm-0">
              <p class="font-weight-semibold">Invoice From:</p>
              <v-select
                v-model="select"
                theme--light
                outlined
                dense
                label="Select Customer"
                :items="items"
                :hint="`${select.state}, ${select.abbr}`"
                item-text="state"
                item-value="abbr"
              >
              </v-select>
              <p class="mb-1"></p>
              <p class="mb-1"></p>
              <!---->
              <p class="mb-1"></p>
              <p class="mb-0"></p>
            </div>
            <div>
              
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
          <div class="single-product-form">
            <div class="add-products-header mb-2 d-none d-md-flex">
              <div class="px-5 flex-grow-1 font-weight-semibold">
                <div class="row">
                  <div class="col-md-6 col-12"><span>Item</span></div>
                  <div class="col-md-2 col-12"><span>Cost</span></div>
                  <div class="col-md-2 col-12"><span>Hours</span></div>
                  <div class="col-md-2 col-12"><span>Price</span></div>
                </div>
              </div>
              <div class="header-spacer"></div>
            </div>
            <div class="d-flex v-card v-sheet v-sheet--outlined theme--light">
              <div class="pa-5 flex-grow-1">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <v-select label="Select Item" outlined dense> </v-select>
                    <v-textarea
                      outlined
                      label="Description"
                      rows="3"
                    ></v-textarea>
                  </div>
                  <div class="col-sm-4 col-md-2 col-12">
                    <v-text-field outlined label="Cost" dense></v-text-field>
                  </div>
                  <div class="col-sm-4 col-md-2 col-12">
                    <v-text-field outlined label="Hours" dense></v-text-field>
                  </div>
                  <div class="col-sm-4 col-md-2 col-12">
                    <p class="my-2">
                      <span class="d-inline d-md-none">Price: </span
                      ><span>$0</span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-column item-actions rounded-0 pa-1">
                <v-icon class="pa-3"> mdi-close </v-icon>
                <div class="spacer"></div>
                <v-icon class="pa-3"> mdi-cog-outline </v-icon>
              </div>
            </div>
          </div>
          <v-btn
            class="mt-4 primary--text"
            outlined
            theme--light
            default
            primary
          >
            <span> Add Item </span>
          </v-btn>
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
                <v-text-field outlined dense></v-text-field>
              </div>
              <v-text-field
                placeholder="Thanks for your business"
                outlined
                dense
              ></v-text-field>
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
            <p class="font-weight-semibold mb-2">Note:</p>
            <v-textarea
              outlined
              rows="3"
              placeholder="It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!"
            ></v-textarea>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-12">
      <div class="mb-6 v-card v-sheet theme--light">
        <div class="v-card__text">
          <v-btn class="mb-3 primary" block>
            <span class="v-btn__content"
              ><v-icon class="me-2 left theme--light">mdi-send</v-icon
              ><span>Send Invoice</span></span
            ></v-btn
          >
          <v-btn class="mb-3" outlined block color="grey"> Send Invoice</v-btn>
          <v-btn class="mb-3" outlined block color="grey">Save</v-btn>
        </div>
      </div>
      <v-select dense outlined placeholder="Accept Payment Via"></v-select>

      <div class="d-flex align-center justify-space-between">
        <span>Payment Terms</span>
        <v-switch dense small></v-switch>
      </div>
      <div class="d-flex align-center justify-space-between">
        <span>Client Notes</span>
        <v-switch dense small></v-switch>
      </div>
      <div class="d-flex align-center justify-space-between">
        <span>Payment Stub</span>
        <v-switch dense small></v-switch>
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
};
</script>

<style>
</style>