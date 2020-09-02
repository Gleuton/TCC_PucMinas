<template>
  <div id="UserType" class="container-fluid">
    <b-card  class="mt-6" header="Tipos de Usuário">
      <p>
        <b-button variant="success" @click="cadFrom ()">Cadastrar</b-button>
      </p>
      <b-table striped hover
      show-empty
      :items="listUserTypes"
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
        { key: 'type', sortable: true, label: 'Tipo' },
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ]
    }
  },
  mounted () {
    this.ActionListUserTypes()
  },
  computed: {
    ...mapState('userType', ['userTypes']),
    listUserTypes () {
      return this.userTypes
    }
  },
  methods: {
    ...mapActions('userType', [
      'ActionListUserTypes',
      'ActionDisableUserType'
    ]),
    cadFrom () {
      this.$router.replace({ name: 'user_type/cad_form' })
    },
    editForm (itemId) {
      this.$router.replace({
        name: 'user_type/edit_form',
        params: { id: itemId }
      })
    },
    disable (itemId) {
      this.$bvModal.msgBoxConfirm(
        'Realmente deseja excluir este tipo?', {
          okVariant: 'danger',
          okTitle: 'Sim',
          cancelTitle: 'Não',
          cancelVariant: 'primary'
        })
        .then(value => {
          if (value) {
            this.ActionDisableUserType(itemId).then(() => {
              this.ActionListUserTypes()
              this.$toastr.s('Tipo excluído')
            })
          }
        })
        .catch(err => {
          console.log(err)
        })
    }
  }
}
</script>
