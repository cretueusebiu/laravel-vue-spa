<template>
    <table class="table table-bordered">
      <thead>
        <tr v-if="data">
          <th v-for="key in Object.keys(data[0])">
              {{ key | capitalize }}
          </th>
          <th v-if="options">
              Options
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-if="data" v-for="row in Object.values(data)">
          <td v-for="value in row">{{ value | capitalize }}</td>
          <td v-if="options">
              <router-link v-if="options.includes('show')" :to="{ name: 'users.show', params: { 'id': row.id } }" class="btn btn-primary btn-sm">
                  View
              </router-link>
              <router-link v-if="options.includes('edit')" :to="{ name: 'users.edit', params: { 'id': row.id } }" class="btn btn-primary btn-sm">
                  Edit
              </router-link>
              <router-link v-if="options.includes('destroy')" :to="{ name: 'users.show', params: { 'id': row.id } }" class="btn btn-primary btn-sm">
                  Delete
              </router-link>
          </td>
        </tr>
      </tbody>
    </table>
</template>

<script>
export default {
  name: 'v-table',

  props: {
    'data': null,
    'options': null
  },

  filters: {
    capitalize: function (str) {
      return typeof str === 'string' ? str.charAt(0).toUpperCase() + str.slice(1) : str
    }
  },
}
</script>
