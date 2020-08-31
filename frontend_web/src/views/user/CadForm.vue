<template>
  <div id="User" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar de usuário">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-name"
          label="Nome:"
          label-for="name"
        >
          <b-form-input
            id="name"
            v-model="form.name"
            type="text"
            required
            placeholder="Nome do Usuário"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-login"
          label="E-mail (login):"
          label-for="login"
        >
          <b-form-input
            id="login"
            v-model="form.login"
            type="email"
            required
            placeholder="E-mail do Usuário"
          ></b-form-input>
        </b-form-group>
        <b-form-group
          id="input-group-type"
          label="Tipo de Usuário:"
          label-for="userTypes"
        >
          <b-form-select id="userTypes" v-model="form.user_type_id" :options="optionsUserType()"></b-form-select>
        </b-form-group>

        <b-form-group
          id="input-group-password"
          label="Senha:"
          label-for="password"
        >
          <b-form-input
            id="password"
            v-model="form.password"
            type="password"
            required
            placeholder="Senha"
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-password-confirmation"
          label="Senha:"
          label-for="confirmation"
        >
          <b-form-input
            id="confirmation"
            v-model="form.password_confirmation"
            type="password"
            required
            placeholder="Confirme a Senha"
          ></b-form-input>
        </b-form-group>

        <div class="button-box">
          <b-button type="button" @click="back()" variant="primary">Voltar</b-button>
          <b-button type="submit" variant="success">Salvar</b-button>
        </div>
      </b-form>
      <div v-if="errors" class="box-errors">
        <div v-for="(v, k) in errors" :key="k">
          <p v-for="error in v" :key="error" class="text-sm">
            {{ error }}
          </p>
        </div>
      </div>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  name: 'UserType',
  data () {
    return {
      form: {
        nome: '',
        login: '',
        user_type_id: '',
        password: '',
        password_confirmation: ''
      },
      errors: null
    }
  },
  mounted () {
    this.ActionListUserTypes()
  },
  computed: {
    ...mapState('userType', ['userTypes'])
  },
  methods: {
    ...mapActions('user', [
      'ActionAddUser'
    ]),
    ...mapActions('userType', [
      'ActionListUserTypes'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      try {
        await this.ActionAddUser(
          JSON.stringify(this.form)
        )
        this.$toastr.s('Sucesso ao Cadastrar')
        this.back()
      } catch (error) {
        this.errors = error.data
      }
    },
    back () {
      this.$router.replace({ name: 'user' })
    },
    optionsUserType () {
      const types = this.userTypes.map((item) => {
        return { value: item.id, text: item.type }
      })
      types.push(
        { value: '', text: 'Selecione um tipo' }
      )
      return types.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
    }
  }
}
</script>
<style lang="scss">
</style>
