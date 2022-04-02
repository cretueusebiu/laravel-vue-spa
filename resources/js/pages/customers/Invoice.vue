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
                disabled
                label="5701"
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
              <p class="font-weight-semibold">Invoice To:</p>
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
                    <v-textarea outlined label="Description" rows="3"></v-textarea>
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
                <button
                  type="button"
                  class="
                    v-btn v-btn--icon v-btn--round
                    theme--light
                    v-size--small
                  "
                >
                  <span class="v-btn__content"
                    ><span
                      aria-hidden="true"
                      class="v-icon notranslate theme--light"
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
                          d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"
                        ></path></svg></span
                  ></span>
                </button>
                <div class="spacer"></div>
                <button
                  type="button"
                  class="
                    v-btn v-btn--icon v-btn--round
                    theme--light
                    v-size--small
                  "
                >
                  <span class="v-btn__content"
                    ><span
                      aria-hidden="true"
                      class="v-icon notranslate theme--light"
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
                          d="M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8M12,10A2,2 0 0,0 10,12A2,2 0 0,0 12,14A2,2 0 0,0 14,12A2,2 0 0,0 12,10M10,22C9.75,22 9.54,21.82 9.5,21.58L9.13,18.93C8.5,18.68 7.96,18.34 7.44,17.94L4.95,18.95C4.73,19.03 4.46,18.95 4.34,18.73L2.34,15.27C2.21,15.05 2.27,14.78 2.46,14.63L4.57,12.97L4.5,12L4.57,11L2.46,9.37C2.27,9.22 2.21,8.95 2.34,8.73L4.34,5.27C4.46,5.05 4.73,4.96 4.95,5.05L7.44,6.05C7.96,5.66 8.5,5.32 9.13,5.07L9.5,2.42C9.54,2.18 9.75,2 10,2H14C14.25,2 14.46,2.18 14.5,2.42L14.87,5.07C15.5,5.32 16.04,5.66 16.56,6.05L19.05,5.05C19.27,4.96 19.54,5.05 19.66,5.27L21.66,8.73C21.79,8.95 21.73,9.22 21.54,9.37L19.43,11L19.5,12L19.43,13L21.54,14.63C21.73,14.78 21.79,15.05 21.66,15.27L19.66,18.73C19.54,18.95 19.27,19.04 19.05,18.95L16.56,17.95C16.04,18.34 15.5,18.68 14.87,18.93L14.5,21.58C14.46,21.82 14.25,22 14,22H10M11.25,4L10.88,6.61C9.68,6.86 8.62,7.5 7.85,8.39L5.44,7.35L4.69,8.65L6.8,10.2C6.4,11.37 6.4,12.64 6.8,13.8L4.68,15.36L5.43,16.66L7.86,15.62C8.63,16.5 9.68,17.14 10.87,17.38L11.24,20H12.76L13.13,17.39C14.32,17.14 15.37,16.5 16.14,15.62L18.57,16.66L19.32,15.36L17.2,13.81C17.6,12.64 17.6,11.37 17.2,10.2L19.31,8.65L18.56,7.35L16.15,8.39C15.38,7.5 14.32,6.86 13.12,6.62L12.75,4H11.25Z"
                        ></path></svg></span
                  ></span>
                </button>
              </div>
            </div>
          </div>
          <button
            type="button"
            class="
              mt-4
              v-btn v-btn--outlined
              theme--light
              v-size--default
              primary--text
            "
          >
            <span> Add Item </span>
          </button>
        </div>
        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <div class="v-card__text py-9 px-8">
          <div
            class="
              d-flex
              justify-space-between
              flex-wrap flex-column flex-sm-row
            "
          >
            <div class="mb-6 mb-sm-0">
              <div class="mb-4 d-flex align-center">
                <span class="font-weight-semibold me-2">Salesperson:</span>
                <div
                  class="
                    v-input
                    input-salesperson
                    v-input--hide-details v-input--dense
                    theme--light
                    v-text-field
                    v-text-field--is-booted
                    v-text-field--enclosed
                    v-text-field--outlined
                  "
                >
                  <div class="v-input__control">
                    <div class="v-input__slot">
                      <fieldset aria-hidden="true">
                        <legend style="width: 0px">
                          <span class="notranslate">​</span>
                        </legend>
                      </fieldset>
                      <div class="v-text-field__slot">
                        <input id="input-449" type="text" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="
                  v-input
                  input-thanks-note
                  v-input--hide-details v-input--dense
                  theme--light
                  v-text-field
                  v-text-field--is-booted
                  v-text-field--enclosed
                  v-text-field--outlined
                  v-text-field--placeholder
                "
              >
                <div class="v-input__control">
                  <div class="v-input__slot">
                    <fieldset aria-hidden="true">
                      <legend style="width: 0px">
                        <span class="notranslate">​</span>
                      </legend>
                    </fieldset>
                    <div class="v-text-field__slot">
                      <input
                        id="input-450"
                        placeholder="Thanks for your business"
                        type="text"
                      />
                    </div>
                  </div>
                </div>
              </div>
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
        </div>
        <hr
          role="separator"
          aria-orientation="horizontal"
          class="v-divider theme--light"
        />
        <div class="v-card__text px-8 py-6">
          <div class="mb-0">
            <p class="font-weight-semibold mb-2">Note:</p>
            <div
              class="
                v-input v-textarea
                v-input--hide-details
                theme--light
                v-text-field
                v-text-field--is-booted
                v-text-field--enclosed
                v-text-field--outlined
                v-text-field--placeholder
              "
            >
              <div class="v-input__control">
                <div class="v-input__slot">
                  <fieldset aria-hidden="true">
                    <legend style="width: 0px">
                      <span class="notranslate">​</span>
                    </legend>
                  </fieldset>
                  <div class="v-text-field__slot">
                    <textarea
                      id="input-453"
                      placeholder="It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-12">
      <div class="mb-6 v-card v-sheet theme--light">
        <div class="v-card__text">
          <button
            type="button"
            class="
              mb-3
              v-btn v-btn--block v-btn--is-elevated v-btn--has-bg
              theme--light
              v-size--default
              primary
            "
          >
            <span class="v-btn__content"
              ><span
                aria-hidden="true"
                class="v-icon notranslate me-2 v-icon--left theme--light"
                ><svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  role="img"
                  aria-hidden="true"
                  class="v-icon__svg"
                >
                  <path
                    d="M4 6.03L11.5 9.25L4 8.25L4 6.03M11.5 14.75L4 17.97V15.75L11.5 14.75M2 3L2 10L17 12L2 14L2 21L23 12L2 3Z"
                  ></path></svg></span
              ><span>Send Invoice</span></span
            ></button
          ><button
            type="button"
            class="
              mb-3
              v-btn v-btn--block v-btn--outlined
              theme--light
              v-size--default
              secondary--text
            "
          >
            <span class="v-btn__content"> Preview </span></button
          ><button
            type="button"
            class="
              v-btn v-btn--block v-btn--outlined
              theme--light
              v-size--default
              secondary--text
            "
          >
            <span class="v-btn__content"> Save </span>
          </button>
        </div>
      </div>
      <div
        class="
          v-input
          mb-6
          v-input--hide-details v-input--dense
          theme--light
          v-text-field
          v-text-field--is-booted
          v-text-field--enclosed
          v-text-field--outlined
          v-text-field--placeholder
          v-select
        "
      >
        <div class="v-input__control">
          <div
            role="button"
            aria-haspopup="listbox"
            aria-expanded="false"
            aria-owns="list-459"
            class="v-input__slot"
          >
            <fieldset aria-hidden="true">
              <legend style="width: 0px">
                <span class="notranslate">​</span>
              </legend>
            </fieldset>
            <div class="v-select__slot">
              <div class="v-select__selections">
                <input
                  id="input-459"
                  placeholder="Accept Payment Via"
                  readonly="readonly"
                  type="text"
                  aria-readonly="false"
                  autocomplete="off"
                />
              </div>
              <div class="v-input__append-inner">
                <div class="v-input__icon v-input__icon--append">
                  <span
                    aria-hidden="true"
                    class="v-icon notranslate theme--light"
                    ><svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      role="img"
                      aria-hidden="true"
                      class="v-icon__svg"
                    >
                      <path d="M7,10L12,15L17,10H7Z"></path></svg
                  ></span>
                </div>
              </div>
              <input type="hidden" />
            </div>
            <div class="v-menu"><!----></div>
          </div>
        </div>
      </div>
      <div class="d-flex align-center justify-space-between mb-3">
        <span>Payment Terms</span>
        <div
          class="
            v-input
            mt-0
            v-input--hide-details v-input--is-label-active v-input--is-dirty
            theme--light
            v-input--selection-controls v-input--switch
            primary--text
          "
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-input--selection-controls__input">
                <input
                  aria-checked="true"
                  id="input-462"
                  role="switch"
                  type="checkbox"
                  aria-disabled="false"
                  value=""
                />
                <div
                  class="v-input--selection-controls__ripple primary--text"
                ></div>
                <div
                  class="v-input--switch__track theme--light primary--text"
                ></div>
                <div class="v-input--switch__thumb theme--light primary--text">
                  <!---->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex align-center justify-space-between mb-3">
        <span>Client Notes</span>
        <div
          class="
            v-input
            mt-0
            v-input--hide-details
            theme--light
            v-input--selection-controls v-input--switch
          "
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-input--selection-controls__input">
                <input
                  aria-checked="false"
                  id="input-464"
                  role="switch"
                  type="checkbox"
                  aria-disabled="false"
                  value=""
                />
                <div class="v-input--selection-controls__ripple"></div>
                <div class="v-input--switch__track theme--light"></div>
                <div class="v-input--switch__thumb theme--light"><!----></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex align-center justify-space-between">
        <span>Payment Stub</span>
        <div
          class="
            v-input
            mt-0
            v-input--hide-details
            theme--light
            v-input--selection-controls v-input--switch
          "
        >
          <div class="v-input__control">
            <div class="v-input__slot">
              <div class="v-input--selection-controls__input">
                <input
                  aria-checked="false"
                  id="input-466"
                  role="switch"
                  type="checkbox"
                  aria-disabled="false"
                  value=""
                />
                <div class="v-input--selection-controls__ripple"></div>
                <div class="v-input--switch__track theme--light"></div>
                <div class="v-input--switch__thumb theme--light"><!----></div>
              </div>
            </div>
          </div>
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
};
</script>

<style>
</style>