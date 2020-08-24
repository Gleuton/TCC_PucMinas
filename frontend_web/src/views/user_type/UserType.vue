<template>
  <div id="UserType" class="container-fluid">
    <b-card>
      <h2>
        Tipos de Usuário <b-button variant="success">Cadastrar</b-button>
      </h2>
      <b-table striped hover
      show-empty
      :items="listUserTypes"
      :fields="fields"
      >
        <template v-slot:cell(actions)="row">
          <b-button-group size="sm">
            <b-button variant="info"
            @click="info(row.item, row.index, $event.target)">
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
    ...mapActions('userType', ['ActionListUserTypes'])
  }
}
</script>
<style lang="scss">
.card{
  margin: 15px 0;
}
</style>
