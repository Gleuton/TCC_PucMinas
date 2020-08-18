<template>
  <div id="login">
    <form @submit.prevent="submit()">
      <div class="login-page">
        <div class="card">
          <div class="card-header">Login</div>
          <div class="card-body">
            <div class="form-group">
              <input required type="email" v-model="form.email" class="form-control" placeholder="E-mail" />
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
export default {
  data: () => ({
    form: {
      email: '',
      password: ''
    }
  }),
  methods: {
    submit () {
      console.log(this.form)
    }
  }
}
</script>

<style scoped lang="scss">
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
