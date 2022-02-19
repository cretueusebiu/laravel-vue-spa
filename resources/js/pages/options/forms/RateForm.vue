<template>
  <div class="row">
    <h3><center>Rate Express</center></h3>
    <h4>
      <center>Please fill out the form to get the latest rates</center>
    </h4>
    <ul class="list-group" v-if="errors.length > 0">
      <li
        class="list-group-item list-group-item-danger"
        v-for="error in errors"
        :key="error"
      >
        {{ error }}
      </li>
    </ul>
    <form @submit.prevent ref="getRate" :model="Notes">
      <div class="text-center">
        <label for="rate-name"><span class="text-center">Name: </span></label>
        <input
          id="rate-name"
          type="text"
          v-model="form.name"
          class="form-control "
          name="rate-name"
        />
        <div class="row">
          <div class="col-md-6">
            <label for="rate-address1">Address 1:</label>
            <input
              id="rate-address1"
              type="text"
              v-model="form.address1"
              class="form-control"
              name="rate-address1"
            />
          </div>
          <div class="col-md-6">
            <label for="rate-address2">Address 2:</label>
            <input
              id="rate-address2"
              type="text"
              v-model="form.address2"
              class="form-control"
              name="rate-address2"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label for="rate-city"
              ><span class="text-center">City:</span></label
            >
            <input
              id="rate-city"
              type="text"
              v-model="form.city"
              class="form-control "
              name="rate-city"
            />
          </div>
          <div class="col-md-2">
            <label for="rate-province_code"
              ><span class="text-center">Province Code:</span></label
            >
            <input
              id="rate-province_code"
              type="text"
              v-model="form.province_code"
              class="form-control "
              name="rate-province_code"
            />
          </div>

          <div class="col-md-2">
            <label for="rate-postal_code"
              ><span class="text-center">Postal Code:</span></label
            >
            <input
              id="rate-postal_code"
              type="text"
              v-model="form.postal_code"
              class="form-control "
              name="rate-postal_code"
            />
          </div>
          <div class="col-md-2">
            <label for="rate-country_code"
              ><span class="text-center">Country Code:</span></label
            >
            <input
              id="rate-country_code"
              type="text"
              v-model="form.country_code"
              class="form-control "
              name="rate-country_code"
            />
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <label for="rate-weight"
              ><span class="text-center">Weight:</span></label
            >
            <input
              id="rate-weight"
              type="number"
              v-model="form.weight"
              step="any"
              class="form-control "
              name="rate-weight"
            />
          </div>
          <div class="col-md-2">
            <label for="rate-weight_unit"
              ><span class="text-center">Weight Unit:</span></label
            ><select
              class="form-select "
              id="rate-weight_unit"
              v-model="form.weight_unit"
              ><option value="lbs" class="text-center" selected>lbs</option
              ><option value="oz" class="text-center">oz</option
              ><option value="kg" class="text-center">kg</option></select
            >
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <label for="rate-length"
              ><span class="text-center">Length:</span></label
            >
            <input
              id="rate-length"
              type="number"
              step="any"
              v-model="form.length"
              class="form-control "
              name="rate-length"
            />
          </div>
          <div class="col-md-3">
            <label for="rate-width"
              ><span class="text-center">Width:</span></label
            >

            <input
              id="rate-width"
              type="number"
              step="any"
              v-model="form.width"
              class="form-control "
              name="rate-width"
            />
          </div>
          <div class="col-md-3">
            <label for="rate-height"
              ><span class="text-center">Height:</span></label
            >
            <input
              id="rate-height"
              step="any"
              type="number"
              v-model="form.height"
              class="form-control "
              name="rate-height"
            />
          </div>
          <div class="col-md-3">
            <label for="rate-size_unit"
              ><span class="text-center">Size Unit:</span></label
            >
            <select
              class="form-select "
              id="rate-size_unit"
              v-model="form.size_unit"
              ><option value="cm" class="text-center" selected>cm</option
              ><option value="in" class="text-center">in</option></select
            >
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="package_contents"
                ><span class="text-center">Package Contents:</span></label
              >
              <input
                id="rate-package_contents"
                type="text"
                v-model="form.package_contents"
                class="form-control "
                name="rate-package_contents"
              />
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <label for="rate-value"
                ><span class="text-center">Value:</span></label
              >
              <input
                id="rate-value"
                type="number"
                v-model="form.value"
                step="any"
                class="form-control "
                name="rate-value"
              />
            </div>
            <div class="col-md-2">
              <label for="rate-currency"
                ><span class="text-center">Currency:</span></label
              >
              <select
                class="form-select"
                id="rate-currency"
                v-model="form.currency"
                ><option value="CAD" class="text-center" selected>CAD</option
                ><option value="USD" class="text-center">USD</option></select
              >
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <label for="rate-package_type"
                ><span class="text-center">Package type: </span></label
              >
              <select
                class="form-select "
                id="rate-package_type"
                v-model="form.package_type"
                ><option value="parcel" class="text-center" selected
                  >Parcel</option
                ><option value="letter" class="text-center">Letter</option>
                <option value="large_envelope_or_flat" class="text-center"
                  >Large Envelope or Flat</option
                >
                <option value="oz" class="text-center">Thick Envelope</option
                ><option value="legal_flat_rate_envelope" class="text-center"
                  >Legal flat rate envelope</option
                ><option value="flat_rate_padded_envelope" class="text-center"
                  >Flat rate padded envelope</option
                >
                <option value="small_flat_rate_box" class="text-center"
                  >Small flate rate box</option
                ><option value="medium_flat_rate_box_1" class="text-center"
                  >Medium flat rate box 1</option
                ><option value="medium_flat_rate_box_2" class="text-center"
                  >Medium flat rate box 2</option
                >
                <option value="large_flat_rate_box" class="text-center"
                  >Large flat rate box</option
                ><option value="regional_rate_box_a1" class="text-center"
                  >Regional Rate Box A1</option
                ><option value="regional_rate_box_a2" class="text-center"
                  >Region Rate Box A2</option
                >
                <option value="regional_rate_box_b1" class="text-center"
                  >Regional Rate Box B1</option
                ><option value="regional_rate_box_b2" class="text-center"
                  >Regional Rate Box B2</option
                ></select
              >
            </div>
            <div class="col-md-3">
              <label for="rate-signature_confirmation"
                ><span class="text-center">Signature Confirmation:</span></label
              >
              <select
                class="form-select"
                id="rate-signature_confirmation"
                v-model="form.signature_confirmation"
                ><option value="true" class="text-center" selected>True</option
                ><option value="false" class="text-center"
                  >False</option
                ></select
              >
            </div>
            <div class="col-md-3">
              <label for="rate-purchase_label"
                ><span class="text-center">Purchase Label:</span></label
              >
              <select
                class="form-select"
                id="rate-purchase_label"
                v-model="form.purchase_label"
                ><option value="true" class="text-center" selected>True</option
                ><option value="false" class="text-center"
                  >False</option
                ></select
              >
            </div>
            <div class="col-md-3">
              <label for="rate-insured"
                ><span class="text-center">Insured</span></label
              >
              <select
                class="form-select"
                id="rate-insured"
                v-model="form.insured"
                ><option value="true" class="text-center" selected>True</option
                ><option value="false" class="text-center"
                  >False</option
                ></select
              >
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <label for="rate-region"
                ><span class="text-center">Region:</span></label
              >

              <input
                id="rate-region"
                type="text"
                v-model="form.regioh"
                class="form-control "
                name="rate-region"
              />
            </div>
          </div>
        </div>
        <center>
          <button
            id="getRateButton"
            type="submit"
            class="btn btn-primary m-2"
            @click="getRate()"
          >
            Get Rate
          </button>
        </center>
      </div>
    </form>
    <hr />
    <h5 class="text-center">Rates:</h5>
    <div v-for="(item, index) in rates" :key="item">
      {{ index.rates }}
      <div class="d-flex row text-center m-b-2">
        <div class="col-md-4">
          <strong
            ><small
              >Package Type: {{ item.package_type && item.package_type }}</small
            ></strong
          >
        </div>
        <div class="col-md-4">
          <strong
            ><small>
              Trackable: {{ item.trackable ? "Yes" : "No" }}</small
            ></strong
          >
        </div>
        <div class="col-md-4">
          <strong
            ><small>
              Delivery Time:
              {{ item.delivery_days && item.delivery_days }} days.</small
            ></strong
          >
        </div>
      </div>
      <h4>{{ item.postage_type }}</h4>
      <div class="row mb-3">
        <div class="col-md-4 bg-light bg-gradient " v-if="item.add_ons[0]">
          <h6 v-if="item.add_ons[0]">
            {{ item.add_ons[0].name && item.add_ons[0].name }}
          </h6>
          <small>{{
            item.add_ons[0].cost && item.add_ons[0].currency
              ? "Cost: " + item.add_ons[0].cost + " " + item.add_ons[0].currency
              : "Cost: " + 0.0 + " " + item.add_ons[0].currency
          }}</small>
        </div>
        <div class="col-md-4 bg-secondary text-white" v-if="item.add_ons[1]">
          <h6>
            {{ item.add_ons[1].name && item.add_ons[1].name }}
          </h6>
          <small v-if="item.add_ons[1]">{{
            item.add_ons[1].cost && item.add_ons[1].currency
              ? "Cost: " + item.add_ons[1].cost + " " + item.add_ons[1].currency
              : "Cost: " + 0.0 + " " + item.add_ons[1].currency
          }}</small>
        </div>
      </div>
      <div class="mt-3 mb-3">
        Return Address: <br />
        Address 1:
        {{ item.return_address.address1 && item.return_address.address1 }}<br />
        Address 2:
        {{ item.return_address.address2 && item.return_address.address2 }}<br />
        Postal Code:
        {{ item.return_address.postal_code && item.return_address.postal_code
        }}<br />
        City:
        {{ item.return_address.city && item.return_address.city }}<br />
        Country Code:
        {{ item.return_address.country_code && item.return_address.country_code
        }}<br />
        Phone:
        {{ item.return_address.phone && item.return_address.phone }}<br />
      </div>
      <small
        >Rate: {{ item.rate && item.rate }}
        {{ item.currency && item.currency }}</small
      >
      <br />
      <small
        >Total: {{ item.total && item.total }}
        {{ item.currency && item.currency }}</small
      >
      <hr />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Form from "vform";
export default {
  middleware: "auth",
  name: "RateForm",
  mounted() {},
  data() {
    return {
      errors: [],
      rates: "",
      form: new Form({
        name: null,
        address1: null,
        address2: null,
        city: null,
        province_code: null,
        postal_code: null,
        country_code: null,
        weight_unit: null,
        weight: null,
        length: null,
        width: null,
        height: null,
        size_unit: null,
        package_contents: null,
        value: null,
        currency: null,
        package_type: null,
        signature_confirmation: null,
        purchase_label: null,
        insured: null,
        region: null
      })
    };
  },
  methods: {
    async getRate() {
      document.getElementById("getRateButton").innerHTML = "Loading...";
      document.getElementById("getRateButton").disabled = true;
      await axios.post(`/api/get-rate`, this.form).then(res => {
        if (res.data.success === false) {
          this.errors = res.data.errors;
        } else {
          this.errors = [];
          this.rates = res.data.rates;
        }
      });
      document.getElementById("getRateButton").innerHTML = "Get Rate";
      document.getElementById("getRateButton").disabled = false;
    }
  },
  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo() {
    return { title: this.$t("rate") };
  }
};
</script>
