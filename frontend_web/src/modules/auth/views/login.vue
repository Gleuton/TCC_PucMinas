<template>
<div id="login">
  <div class="login-page">
    <form @submit.prevent="submit()">
      <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
          <div class="form-group">
            <input required type="email" v-model="form.login" class="form-control" placeholder="E-mail" />
          </div>
          <div class="form-group">
            <input required type="password" v-model="form.password" class="form-control" placeholder="Senha" />
          </div>
          <button class="btn btn-primary btn-lg btn-block">Entrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  data: () => ({
    form: {
      login: '',
      password: ''
    }
  }),
  methods: {
    ...mapActions('auth', ['ActionDoLogin']),
    async submit () {
      try {
        await this.ActionDoLogin(this.form)
        this.$router.replace({ name: 'home' })
      } catch (error) {
        this.$toastr.w(error.data.message, 'Erro ao Logar')
      }
    }
  }
}
</script>

<style lang="scss" scoped>
.login-page {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
