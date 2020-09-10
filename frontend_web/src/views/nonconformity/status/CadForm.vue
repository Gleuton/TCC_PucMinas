<template>
  <div id="CadNCType" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar status de não conformidade">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-type"
          label="Status da NC:"
          label-for="status"
        >
          <b-form-input
            id="status"
            v-model="form.status"
            type="text"
            @keyup="valid_status()"
            placeholder="Status da não conformidade"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.status.valid">
            {{ validation_form.status.message }}
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
  name: 'CadNCStatus',
  data () {
    return {
      form: {
        status: ''
      },
      validation_form: {
        status: {
          valid: true,
          message: ''
        }
      }
    }
  },
  methods: {
    ...mapActions('ncStatus', [
      'ActionAddNCStatus'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      if (this.valid_status()) {
        try {
          await this.ActionAddNCStatus(
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
      this.$router.replace({ name: 'nc_status' })
    },
    valid_status () {
      this.validation_form.status.valid = true
      if (this.form.status.length >= 255) {
        this.validation_form.status.valid = false
        this.validation_form.status.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.status.length <= 0) {
        this.validation_form.status.valid = false
        this.validation_form.status.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.status.valid
    }
  }
}
</script>
