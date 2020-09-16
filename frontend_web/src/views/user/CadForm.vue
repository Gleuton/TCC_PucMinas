<template>
  <div id="User" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar usuário">
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
            @keyup="name_validate()"
            placeholder="Nome do Usuário"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.name.valid">
            {{ validation_form.name.message }}
          </small>
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
            @keyup="email_validate()"
            placeholder="E-mail do Usuário"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.login.valid">
            {{ validation_form.login.message }}
          </small>
        </b-form-group>
        <b-form-group
          id="input-group-type"
          label="Tipo de Usuário:"
          label-for="userTypes"
        >
          <b-form-select
          id="userTypes"
          v-model="form.user_type_id"
          :options="optionsUserType()"
          @change="type_validate()"
          ></b-form-select>
          <small class="input-error" v-if="!validation_form.user_type_id.valid">
            {{ validation_form.user_type_id.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-password"
          label="Senha:"
          @keyup="password_validate"
          label-for="password"
        >
          <b-form-input
            id="password"
            v-model="form.password"
            type="password"
            placeholder="Senha"
            @keyup="password_validate()"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.password.valid">
            {{ validation_form.password.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-password-confirmation"
          label="Confirme a senha:"
          label-for="confirmation"
        >
          <b-form-input
            id="confirmation"
            v-model="form.password_confirmation"
            type="password"
            @keyup="confim_pwd_validate()"
            placeholder="Confirme a Senha"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.password_confirmation.valid">
            {{ validation_form.password_confirmation.message }}
          </small>
        </b-form-group>

        <div class="button-box">
          <b-button type="button" @click="back()" variant="primary">Voltar</b-button>
          <b-button type="submit" variant="success">Salvar</b-button>
        </div>
      </b-form>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  name: 'User',
  data () {
    return {
      form: {
        name: '',
        login: '',
        user_type_id: '',
        password: '',
        password_confirmation: ''
      },
      validation_form: {
        name: {
          valid: true,
          message: ''
        },
        login: {
          valid: true,
          message: ''
        },
        user_type_id: {
          valid: true,
          message: ''
        },
        password: {
          valid: true,
          message: ''
        },
        password_confirmation: {
          valid: true,
          message: ''
        }
      }
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
      if (this.validate()) {
        try {
          await this.ActionAddUser(
            JSON.stringify(this.form)
          )
          this.$toastr.s('Sucesso ao Cadastrar')
          this.back()
        } catch (error) {
          this.$toastr.e('Erro ao Cadastrar')
        }
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
    },
    validate () {
      const name = this.name_validate()
      const email = this.email_validate()
      const type = this.type_validate()
      const password = this.password_validate()
      const confirm = this.confim_pwd_validate()

      return name && email && type && password && confirm
    },
    name_validate () {
      this.validation_form.name.valid = true
      if (this.form.name.length <= 0) {
        this.validation_form.name.valid = false
        this.validation_form.name.message = 'Este campo é obrigatório.'
      }
      if (this.form.name.length >= 255) {
        this.validation_form.name.valid = false
        this.validation_form.name.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      return this.validation_form.name.valid
    },
    email_validate () {
      this.validation_form.login.valid = true
      if (this.form.login.length <= 0) {
        this.validation_form.login.valid = false
        this.validation_form.login.message = 'Este campo é obrigatório.'
      }
      if (this.form.login.length >= 255) {
        this.validation_form.login.valid = false
        this.validation_form.login.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      return this.validation_form.login.valid
    },
    type_validate () {
      this.validation_form.user_type_id.valid = true
      if (this.form.user_type_id === '') {
        this.validation_form.user_type_id.valid = false
        this.validation_form.user_type_id.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.user_type_id.valid
    },
    password_validate () {
      this.validation_form.password.valid = true
      if (this.form.password.length <= 0) {
        this.validation_form.password.valid = false
        this.validation_form.password.message = 'Este campo é obrigatório.'
      }
      if (this.form.password.length >= 255) {
        this.validation_form.password.valid = false
        this.validation_form.password.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      return this.validation_form.password.valid
    },
    confim_pwd_validate () {
      this.validation_form.password_confirmation.valid = true
      if (this.form.password !== this.form.password_confirmation) {
        this.validation_form.password_confirmation.valid = false
        this.validation_form.password_confirmation.message = 'A confirmação da senha não corresponde.'
      }
      return this.validation_form.password_confirmation.valid
    }
  }
}
</script>
<style lang="scss">
</style>
