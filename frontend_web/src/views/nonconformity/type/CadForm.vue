<template>
  <div id="CadNCType" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar tipo de não conformidade">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-type"
          label="Tipo da NC:"
          label-for="type"
        >
          <b-form-input
            id="type"
            v-model="form.type"
            type="text"
            @keyup="valid_type()"
            placeholder="Tipo da não conformidade"
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
  name: 'CadNCType',
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
    ...mapActions('ncType', [
      'ActionAddNCType'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      if (this.valid_type()) {
        try {
          await this.ActionAddNCType(
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
      this.$router.replace({ name: 'nc_type' })
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
