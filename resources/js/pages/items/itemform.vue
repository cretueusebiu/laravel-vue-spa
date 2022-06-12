<template>
  <v-card rounded="lg">
    <v-card-title v-if="!itemId"> Add Item </v-card-title>
    <v-card-title v-if="itemId"> Update Item </v-card-title>
    <v-card-text>
      <form-alert :form="form" />
      <v-form class="multi-col-validation">
        <v-row>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.item_name"
              :error-messages="form.errors.get('item_name')"
              label="Item Name"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>

          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.category"
              :error-messages="form.errors.get('category')"
              label="Category"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.barcode"
              :error-messages="form.errors.get('barcode')"
              label="Barcode"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.company_name"
              :error-messages="form.errors.get('company_name')"
              label="Company Name"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.cost_price"
              :error-messages="form.errors.get('cost_price')"
              label="Cost Price"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.sale_price"
              :error-messages="form.errors.get('sale_price')"
              label="Sale Price"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.bulk_price"
              :error-messages="form.errors.get('bulk_price')"
              label="Bulk Price"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.available_quantity"
              :error-messages="form.errors.get('available_quantity')"
              label="Available Quantity"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-text-field
              v-model="form.description"
              :error-messages="form.errors.get('description')"
              label="Description"
              required
              outlined
              dense
              hide-details="auto"
            />
          </v-col>
          <v-col cols="12" md="6">
            <v-radio-group
              v-model="form.item_type"
              :error-messages="form.errors.get('item_type')"
              row
            >
              <template #label>
                <div>Item Type</div>
              </template>
              <v-radio label="Stock" value="0" />
              <v-radio label="Non-Stocked" value="1" />
            </v-radio-group>
          </v-col>
        </v-row>
        <v-row>
          <v-col>
            <v-btn
              color="primary"
              :loading="form.busy"
              :disabled="form.busy"
              @click="submitForm"
            >
              {{ itemId ? "Update" : "Submit" }}
            </v-btn>
            <v-btn
              :to="{ name: 'items' }"
              type="reset"
              color="error"
              class="mx-2"
            >
              Cancel
            </v-btn>
          </v-col>
        </v-row>
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
import Form from "vform";
import FormAlert from "../../components/FormAlert.vue";

export default {
  components: { FormAlert },
  middleware: "auth",
  props: { itemId: Number },
  data: function () {
    return {
      loading: false,
      form: new Form({
        item_name: "",
        category: "",
        stock_type: "0",
        barcode: "",
        company_name: "",
        cost_price: "",
        sale_price: "",
        bulk_price: "",
        available_quantity: "",
        description: "",
      }),
    };
  },
  mounted() {
    if (this.itemId) {
      this.loadData();
    }
  },
  methods: {
    loadData: function () {
      this.loading = true;
      this.$http
        .get("/api/items/" + this.itemId)
        .then(({ data }) => {
          // eslint-disable-next-line camelcase
          const { item_name, category, item_type, barcode, company_name, cost_price, sale_price, bulk_price, available_quantity, description } = data.data;
          this.form = new Form({
            item_name,
            category,
            item_type,
            barcode,
            company_name,
            cost_price,
            sale_price,
            bulk_price,
            available_quantity,
            description,
          });
          this.loading = false;
        })
        .catch((error) => {
          console.log(error);
          this.loading = false;
        });
    },
    submitForm: function () {
      if (this.itemId) {
        this.form
          .put("/api/items/" + this.itemId)
          .then(({ data }) => {
            this.$store.dispatch("snackbar/showMessage", data.message);
            this.$router.push({ name: "items" });
          })
          .catch((error) => {
            if (error.response && error.response.data) {
              this.$set(this.form, "errorMessage", error.response.data.message);
            }
            console.log(error);
          });
      } else {
        this.form
          .post("/api/items")
          .then(({ data }) => {
            this.$store.dispatch("snackbar/showMessage", data.message);
            this.$router.push({ name: "items" });
          })
          .catch((error) => {
            if (error.response && error.response.data) {
              this.$set(this.form, "errorMessage", error.response.data.message);
            }
            console.log(error);
          });
      }
    },
  },
};
</script>
