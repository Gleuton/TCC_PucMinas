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
            <b-button variant="info"
              @click="editForm(row.item.id)"
            >
              <b-icon icon="pencil-square" aria-hidden="true"></b-icon> Editar
            </b-button>
            <b-button variant="danger">
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
        { key: 'actions', label: 'Ações' }
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
    ...mapActions('userType', ['ActionListUserTypes']),
    cadFrom () {
      this.$router.replace({ name: 'user_type/cad_form' })
    },
    editForm (itemId) {
      this.$router.replace({
        name: 'user_type/edit_form',
        params: { id: itemId }
      })
    }
  }
}
</script>
<style lang="scss">
</style>
