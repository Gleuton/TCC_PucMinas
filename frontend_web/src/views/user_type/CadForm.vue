<template>
  <div id="UserType" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar de Tipo de Usuário">
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
            required
            maxlength="255"
            placeholder="Tipo do usuário"
          ></b-form-input>
        </b-form-group>

        <b-button type="submit" variant="success">Salvar</b-button>
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
      }
    }
  },
  methods: {
    ...mapActions('userType', [
      'ActionAddUserType'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      try {
        await this.ActionAddUserType(
          JSON.stringify(this.form)
        )
        this.$toastr.s('Sucesso ao Cadastrar')
        this.$router.replace({ name: 'user_type' })
      } catch (error) {
        this.$toastr.e('Erro ao Cadastrar')
      }
    }
  }
}
</script>
<style lang="scss">
</style>
