<template>
  <div id="NcStatus" class="container-fluid">
    <b-card  class="mt-6" header="Status de não conformidade">
      <p>
        <b-button variant="success" @click="cadFrom ()">Cadastrar</b-button>
      </p>
      <b-table striped hover
      show-empty
      :items="listNcTypes"
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
  name: 'NcType',
  data () {
    return {
      fields: [
        { key: 'type', sortable: true, label: 'Tipo' },
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ]
    }
  },
  mounted () {
    this.ActionListNCTypes()
  },
  computed: {
    ...mapState('ncType', ['ncTypes']),
    listNcTypes () {
      return this.ncTypes
    }
  },
  methods: {
    ...mapActions('ncType', [
      'ActionListNCTypes',
      'ActionDisableNCType'
    ]),
    cadFrom () {
      this.$router.replace({ name: 'nc_type/cad_form' })
    },
    editForm (itemId) {
      this.$router.replace({
        name: 'nc_type/edit_form',
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
            this.ActionDisableNCType(itemId).then(() => {
              this.ActionListNCTypes()
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
