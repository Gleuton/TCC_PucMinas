<template>
  <div id="UserType" class="container-fluid">
    <b-card  class="mt-6" header="Editar de Tipo de Usuário">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-type"
          label="Tipo de usuário:"
          label-for="type"
        >
          <b-form-input
            id="type"
            v-model="form.type"
            type="text"
            required
            maxlength="255"
            placeholder="Tipo de usuário"
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
      },
      id: this.$route.params.id
    }
  },
  created () {
    this.ActionGetUserType(this.id).then(res => {
      this.form.type = res.type
    })
  },
  methods: {
    ...mapActions('userType', [
      'ActionGetUserType',
      'ActionEditUserType'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      try {
        await this.ActionEditUserType({
          id: this.id,
          data: JSON.stringify(this.form)
        })
        this.$toastr.s('Sucesso ao Editar')
      } catch (error) {
        this.$toastr.e('Erro ao Editar')
      }
    }
  }
}
</script>
<style lang="scss">

</style>
