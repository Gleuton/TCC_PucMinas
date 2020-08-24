<template>
  <div id="UserType" class="container-fluid">
    <b-card  class="mt-6" header="Cadastro de Tipos de Usuário">
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
            placeholder="Tipo do usuário"
          ></b-form-input>
        </b-form-group>

        <b-button type="submit" variant="success">Enviar</b-button>
      </b-form>
    </b-card>
  </div>
</template>

<script>
export default {
  name: 'UserType',
  data () {
    return {
      form: {
        type: ''
      },
      show: true
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault()
      alert(JSON.stringify(this.form))
    }
  }
}
</script>
<style lang="scss">
.card{
  margin: 15px 0;
}
</style>
