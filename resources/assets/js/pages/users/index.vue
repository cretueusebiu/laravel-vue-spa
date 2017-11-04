<template>
    <div>
        <h1>Users</h1>
        <router-link :to="{ name: 'users.create' }" class="btn btn-primary">
              Add User
        </router-link>
        <h3 v-if="users == null">Sorry no users are in the database.</h3>
        <v-table v-if="this.users != null" :data="users" :options="['show','edit','destroy']"></v-table>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        loading: true,

        computed: mapGetters('users', {
          users: 'getUsers'
        }),

        created () {
            this.$store.dispatch('users/index');
        },

        async update () {
          const { data } = await this.users.patch('/api/users')

          this.$store.dispatch('users/update', { users: data })
        }
    }
</script>
