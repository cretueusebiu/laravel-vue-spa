<template>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-block">
          <form @submit.prevent="reset" @keydown="form.errors.clear($event.target.name)">
            <div v-if="status" class="alert alert-success">
              {{ status }}
            </div>

            <!-- Email -->
            <div class="form-group row" :class="{ 'has-danger': form.errors.has('email') }">
              <label for="email" class="col-sm-3 col-form-label text-sm-right">Email</label>
              <div class="col-sm-7">
                <input v-model="form.email" type="text" name="email" id="email" class="form-control">
                <has-error :form="form" field="email"></has-error>
              </div>
            </div>

            <!-- Password -->
            <div class="form-group row" :class="{ 'has-danger': form.errors.has('password') }">
              <label for="password" class="col-sm-3 col-form-label text-sm-right">Password</label>
              <div class="col-sm-7">
                <input v-model="form.password" type="password" name="password" id="password" class="form-control">
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>

            <!-- Password Confirmation -->
            <div class="form-group row">
              <label for="password_confirmation" class="col-sm-3 col-form-label text-sm-right">Confirm Password</label>
              <div class="col-sm-7">
                <input v-model="form.password_confirmation" type="password" name="password_confirmation" id="password_confirmation" class="form-control">
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
              <div class="col-sm-9 offset-sm-3">
                <button :disabled="form.busy" type="submit" class="btn btn-primary">
                  <icon v-if="form.busy" name="spinner"></icon>
                  Reset Password
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  metaInfo: { titleTemplate: 'Reset Password | %s' },

  data: () => ({
    status: null,
    form: new Form({
      token: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    reset () {
      this.form.token = this.$route.params.token

      this.form.post('/api/password/reset')
        .then(({ data: { status }}) => {
          this.form.reset()
          this.status = status
        })
    }
  }
}
</script>
