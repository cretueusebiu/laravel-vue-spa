<template>
  <div class="card">
    <div class="card-header">
      Password
    </div>
    <div class="card-block">
      <form @submit.prevent="update" @keydown="form.errors.clear($event.target.name)">
        <alert-success :form="form" message="Your password has been updated!"></alert-success>

        <!-- New password -->
        <div class="form-group row" :class="{ 'has-danger': form.errors.has('password') }">
          <label class="col-sm-3 col-lg-3 col-form-label text-right">New Password</label>
          <div class="col-sm-9 col-lg-6">
            <input v-model="form.password" type="password" class="form-control">
            <has-error :form="form" field="password"></has-error>
          </div>
        </div>

        <!-- Confirm new password -->
        <div class="form-group row">
          <label class="col-sm-3 col-lg-3 col-form-label text-right">Confirm Password</label>
          <div class="col-sm-9 col-lg-6">
            <input v-model="form.password_confirmation" type="password" class="form-control">
          </div>
        </div>

        <!-- Update Button -->
        <div class="form-group row">
          <div class="col-sm-9 offset-sm-3 col-lg-6 offset-lg-3">
            <button :disabled="form.busy" type="submit" class="btn btn-success">
              <icon v-if="form.busy" name="spinner"></icon>
              Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  data: () => ({
    form: new Form({
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    update () {
      this.form.patch('/api/settings/password')
        .then(() => this.form.reset())
    }
  }
}
</script>
