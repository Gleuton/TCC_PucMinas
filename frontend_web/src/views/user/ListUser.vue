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
      <template v-slot:cell(actions)="row">
          <b-button-group size="sm">
            <b-button
              variant="info"
              @click="editForm(row.item.id)"
            >
              <b-icon icon="pencil-square" aria-hidden="true"></b-icon> Editar
            </b-button>
            <b-button
              variant="danger"
              @click="disable(row.item.id)"
            >
              <b-icon icon="trash" aria-hidden="true"></b-icon> Excluir
            </b-button>
          </b-button-group>
        </template>
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
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ]
    }
  },
  mounted () {
    this.ActionListUsers()
  },
  computed: {
    ...mapState('user', ['users']),
    listUsers () {
      return this.users
    }
  },
  methods: {
    ...mapActions('user', [
      'ActionListUsers'
    ]),
    cadFrom () {
      this.$router.replace({ name: 'user/cad_form' })
    },
    editForm (userId) {
      this.$router.replace({
        name: 'user/edit_form',
        params: { id: userId }
      })
    },
    disable (userId) {

    }
  }
}
</script>

<style>

</style>
