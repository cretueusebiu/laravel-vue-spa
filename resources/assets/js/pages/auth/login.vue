<template>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-block">
          <form @submit.prevent="login" @keydown="form.errors.clear($event.target.name)">
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

            <!-- Remember Me -->
            <div class="form-group row">
              <div class="col-xs-6 col-sm-4 offset-sm-3">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" value="1" v-model="form.remember">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Remember Me</span>
                </label>
              </div>
              <div class="col-xs-6 col-sm-3 text-right">
                <small>
                  <router-link :to="{ name: 'password.reset' }">Forgot Your Password?</router-link>
                </small>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group row">
              <div class="col-sm-9 offset-sm-3">
                <button :disabled="form.busy" type="submit" class="btn btn-primary">
                  <i v-if="form.busy" class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i>
                  <i v-else class="fa fa-sign-in fa-fw" aria-hidden="true"></i>
                  Login
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
  metaInfo: { titleTemplate: 'Login | %s' },

  data: () => ({
    form: new Form({
      email: '',
      password: '',
      remember: false
    })
  }),

  methods: {
    login () {
      this.form.post('/api/token')
    }
  }
}
</script>
