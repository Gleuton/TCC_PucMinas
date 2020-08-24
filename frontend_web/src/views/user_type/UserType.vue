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
          <b-button-group>
            <b-button variant="info"
            @click="info(row.item, row.index, $event.target)">
              Editar
            </b-button>
            <b-button variant="danger">Excluir</b-button>
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
        { key: 'Tipo', sortable: true },
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
      return this.userTypes.map((el) => {
        return { Tipo: el.type }
      })
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
