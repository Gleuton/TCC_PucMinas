<template>
  <div id="UserType" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar tipo de usuário">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-type"
          label="Tipo do usuário:"
          label-for="type"
        >
          <b-form-input
            id="type"
            v-model="form.type"
            type="text"
            @keyup="valid_type()"
            placeholder="Tipo do usuário"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.type.valid">
            {{ validation_form.type.message }}
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
import { mapActions } from 'vuex'
export default {
  name: 'UserType',
  data () {
    return {
      form: {
        type: ''
      },
      validation_form: {
        type: {
          valid: true,
          message: ''
        }
      }
    }
  },
  methods: {
    ...mapActions('userType', [
      'ActionAddUserType'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      if (this.valid_type()) {
        try {
          await this.ActionAddUserType(
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
      this.$router.replace({ name: 'user_type' })
    },
    valid_type () {
      this.validation_form.type.valid = true
      if (this.form.type.length >= 255) {
        this.validation_form.type.valid = false
        this.validation_form.type.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.type.length <= 0) {
        this.validation_form.type.valid = false
        this.validation_form.type.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.type.valid
    }
  }
}
</script>
<style lang="scss">
</style>
