<template>
    <div>
        <h1>{{ user.name }}</h1>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'

    export default {
        loading: true,

        computed: mapGetters('users', {
          user: 'getUser'
        }),

        created () {
            this.$store.dispatch('users/show', this.$route.params.id);
        },
    }
</script>
