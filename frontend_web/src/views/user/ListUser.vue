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
  name: 'ListUser',
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
      'ActionListUsers',
      'ActionDisableUser'
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
      this.$bvModal.msgBoxConfirm(
        'Realmente deseja excluir este usuário?', {
          okVariant: 'danger',
          okTitle: 'Sim',
          cancelTitle: 'Não',
          cancelVariant: 'primary'
        })
        .then(value => {
          this.ActionDisableUser(userId).then(() => {
            this.ActionListUsers()
            this.$toastr.s('Usuário excluído')
          })
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>

<style>

</style>
