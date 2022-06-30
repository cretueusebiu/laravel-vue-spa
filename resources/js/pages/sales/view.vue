<template>
  <v-card @click="loadData">
    <v-card-text class="py-9 px-8">
      <div class="d-flex flex-wrap justify-space-between flex-column flex-sm-row">
        <div class="mb-8 mb-sm-0">
          <div class="d-flex align-center mb-6">
            <v-img
              lazy-src="https://picsum.photos/id/11/10/6"
              max-height="30"
              max-width="30"
              src="https://picsum.photos/id/11/500/300"
            />
            <span class="text--primary font-weight-bold text-xl ml-6"> {{ $settings.company }} </span>
          </div>
          <div class="d-block">
            {{ $settings.address }}
          </div>
          <div class="d-block">
            <strong>Phone: </strong>{{ $settings.phone }}
          </div>
          <div class="d-block">
            <strong>Email: </strong>{{ $settings.email }}
          </div>
          <div class="d-block">
            <strong>Website: </strong>{{ $settings.website }}
          </div>
        </div>
        <div>
          <p class="font-weight-medium text-xl text--primary mb-4">
            Invoice # {{ invoice.id }}
          </p>
          <p class="mb-2">
            <span>Date Issued: </span>
            <span class="font-weight-semibold">{{ invoice.sale_time }}</span>
          </p>
          <p class="mb-2">
            <span>Due Date: </span>
            <span class="font-weight-semibold">24-12-2021</span>
          </p>
        </div>
      </div>
    </v-card-text>
    <v-divider />
    <v-card-text class="py-9 px-8">
      <div class="payment-details d-flex justify-space-between flex-wrap flex-column flex-sm-row">
        <div v-if="invoice.customer" class="mb-8 mb-sm-0">
          <p class="font-weight-semibold payment-details-header">
            Invoice To:
          </p>
          <p class="mb-1">
            {{ invoice.customer.name }}
          </p>
          <p v-if="invoice.customer.company_name" class="mb-1">
            {{ invoice.customer.company_name }}
          </p>
          <p v-if="invoice.customer.address_1" class="mb-1">
            {{ invoice.customer.address_1 }}
          </p>
          <p v-if="invoice.customer.city || invoice.customer.state || invoice.customer.zip" class="mb-1">
            {{ invoice.customer.city }}, {{ invoice.customer.state }} {{ invoice.customer.zip }}
          </p>
          <p v-if="invoice.customer.country" class="mb-1">
            {{ invoice.customer.country }}
          </p>
          <p v-if="invoice.customer.phone" class="mb-1">
            {{ invoice.customer.phone }}
          </p>
          <p v-if="invoice.customer.email" class="mb-1">
            {{ invoice.customer.email }}
          </p>
        </div>
        <div v-if="false">
          <p class="font-weight-semibold payment-details-header">
            Bill To:
          </p>
          <table>
            <tr>
              <td class="pe-6">
                Total Due:
              </td><td> $12,110.55 </td>
            </tr><tr>
              <td class="pe-6">
                Bank Name:
              </td><td> American Bank </td>
            </tr><tr>
              <td class="pe-6">
                Country:
              </td><td> United States </td>
            </tr><tr>
              <td class="pe-6">
                IBAN:
              </td><td> ETD95476213874685 </td>
            </tr><tr>
              <td class="pe-6">
                SWIFT Code:
              </td><td> BR91905 </td>
            </tr>
          </table>
        </div>
      </div>
    </v-card-text>
    <invoice-items :invoice-items="invoice.items" />
    <v-card-text class="py-9 px-8">
      <div class="invoice-total d-flex justify-space-between flex-column flex-sm-row">
        <div class="mb-2 mb-sm-0">
          <p class="mb-1">
            <span class="font-weight-semibold">Salesperson:</span> <span>Jenny Parker</span>
          </p>
          <p>Thanks for your business</p>
          <p><strong>Comments: </strong> {{ invoice.comment }}</p>
        </div>
        <div>
          <table>
            <tr>
              <td class="pe-16">
                Total:
              </td>
              <th class="text-right">
                {{ invoice.total | currency }}
              </th>
            </tr>
            <tr>
              <td class="pe-16">
                Payment:
              </td>
              <th class="text-right">
                {{ invoice.payment | currency }}
              </th>
            </tr>
          </table>
          <hr role="separator" aria-orientation="horizontal" class="mt-4 mb-3 v-divider theme--light">
          <table class="w-full">
            <tr>
              <td class="pe-16">
                Balance:
              </td>
              <th class="text-right">
                {{ invoice.balance | currency }}
              </th>
            </tr>
          </table>
        </div>
      </div>
    </v-card-text>
    <v-divider />
    <v-card-text class="py-9 px-8">
      <p class="mb-0">
        <span class="font-weight-semibold">Return Policy: </span><span>{{ $settings.return_policy }}</span>
      </p>
    </v-card-text>
  </v-card>
</template>

<script>
import InvoiceItems from './components/invoiceitems.vue'

export default {
  components: { InvoiceItems },
  middleware: 'auth',
  props: {
    invoiceId: {
      type: String,
      default: ''
    }
  },
  data: function () {
    return {
      loading: false,
      invoice: {}
    }
  },
  watch: {
  },
  mounted () {
    if (this.invoiceId) {
      this.loadData()
    }
  },
  methods: {
    loadData: function () {
      this.loading = true
      this.$http
        .get('/api/sales/' + this.invoiceId)
        .then(({ data }) => {
          this.invoice = data.data
          this.loading = false
        })
        .catch(error => {
          console.log(error)
          this.loading = false
        })
    }
  }
}
</script>
