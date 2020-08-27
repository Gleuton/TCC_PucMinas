<template>
  <div id="ListUser" class="container-fluid">
    <b-card  class="mt-6" header="Usuários">
      <p>
        <b-button variant="success" @click="cadFrom ()">Cadastrar</b-button>
      </p>
      <b-table striped hover
      show-empty
      :items="listUsers"
      :fields="fields"
      >
      </b-table>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  name: 'UserType',
  data () {
    return {
      fields: [
        { key: 'name', sortable: true, label: 'Nome' },
        { key: 'login', sortable: true, label: 'E-mail' },
        { key: 'type', sortable: true, label: 'Tipo do usuário' },
        { key: 'actions', label: 'Ações' }
      ]
    }
  },
  mounted () {
    this.ActionListUsers()
  },
  computed: {
    ...mapState('user', ['users']),
    listUsers () {
      console.log(this.users)
      return this.users
    }
  },
  methods: {
    ...mapActions('user', [
      'ActionListUsers'
    ]),
    cadFrom () {
    },
    editForm (userId) {

    },
    disable (userId) {

    }
  }
}
</script>

<style>

</style>
