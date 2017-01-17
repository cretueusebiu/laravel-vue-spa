<template>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Reset Password</div>
        <div class="card-block">
          <form @submit.prevent="send" @keydown="form.errors.clear($event.target.name)">
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

            <!-- Submit Button -->
            <div class="form-group row">
              <div class="col-sm-9 offset-sm-3">
                <button :disabled="form.busy" type="submit" class="btn btn-primary">
                  <i v-if="form.busy" class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>
                  Send Password Reset Link
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
    form: new Form({ email: '' })
  }),

  methods: {
    send () {
      this.form.post('/api/password/email')
        .then(({ data: { status }}) => {
          this.form.reset()
          this.status = status
        })
    }
  }
}
</script>
