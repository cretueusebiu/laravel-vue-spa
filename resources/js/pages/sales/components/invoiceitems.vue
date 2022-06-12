<template>
  <v-simple-table dense>
    <template #default>
      <thead>
        <tr>
          <th v-if="edit" style="width:100px" />
          <th style="width:100px">
            Item #
          </th>
          <th>Name</th>
          <th style="width:100px">
            Price
          </th>
          <th style="width:100px">
            Qty
          </th>
          <th style="width:100px">
            Total
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in invoiceItems"
          :key="item.name"
        >
          <td v-if="edit">
            <v-btn
              class="ma-2"
              text
              icon
              color="red"
              @click="removeItem(item.item_id)"
            >
              <v-icon>
                mdi-delete
              </v-icon>
            </v-btn>
          </td>
          <td>{{ item.id }}</td>
          <td>{{ item.item_name }}</td>
          <td>
            <v-text-field
              v-if="edit"
              v-model="item.price"
              type="number"
            />
            <span v-else>{{ item.price | currency }}</span>
          </td>
          <td>
            <v-text-field
              v-if="edit"
              v-model="item.quantity"
              type="number"
            />
            <span v-else>{{ item.quantity | shownumber }}</span>
          </td>
          <td>{{ parseFloat(item.price * item.quantity) | currency }}</td>
        </tr>
      </tbody>
      <tfoot v-if="edit">
        <tr>
          <th />
          <th />
          <th />
          <th />
          <th>{{ invoiceItems.reduce((sum, item) => sum + parseFloat(item.quantity), 0) }}</th>
          <th>{{ invoiceItems.reduce((sum, item) => sum + parseFloat(item.price * item.quantity), 0) }}</th>
        </tr>
      </tfoot>
    </template>
  </v-simple-table>
</template>

<script>
export default {
  props: {
    invoiceItems: {
      type: Array,
      default () {
        return []
      }
    },
    edit: {
      type: Boolean,
      default: false
    }
  },
  data: function () {
    return {
    }
  },
  watch: {
  },
  mounted () {
  },
  methods: {
  }
}
</script>
