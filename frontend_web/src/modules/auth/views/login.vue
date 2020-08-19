<template>
<div id="login">
  <form @submit.prevent="submit()">
    <div class="login-page">
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
    </div>
  </form>
</div>
</template>

<script>
import {
  mapActions
} from 'vuex'

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
        this.$router.push({ name: 'home' })
      } catch (error) {
        console.log(error.data.message)
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

.card {
  width: 35%;
}
</style>
