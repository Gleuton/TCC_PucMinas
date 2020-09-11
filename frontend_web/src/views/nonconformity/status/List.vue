<template>
  <div id="NcStatus" class="container-fluid">
    <b-card  class="mt-6" header="Status de não conformidade">
      <p>
        <b-button variant="success" @click="cadFrom ()">Cadastrar</b-button>
      </p>
      <b-table striped hover
      show-empty
      :items="listStatus"
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
  name: 'NcStatus',
  data () {
    return {
      fields: [
        { key: 'status', sortable: true, label: 'Status' },
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ]
    }
  },
  mounted () {
    this.ActionListNCStatus()
  },
  computed: {
    ...mapState('ncStatus', ['ncStatus']),
    listStatus () {
      return this.ncStatus
    }
  },
  methods: {
    ...mapActions('ncStatus', [
      'ActionListNCStatus',
      'ActionDisableNCStatus'
    ]),
    cadFrom () {
      this.$router.replace({ name: 'nc_status/cad_form' })
    },
    editForm (itemId) {
      this.$router.replace({
        name: 'nc_status/edit_form',
        params: { id: itemId }
      })
    },
    disable (itemId) {
      this.$bvModal.msgBoxConfirm(
        'Realmente deseja excluir este status?', {
          okVariant: 'danger',
          okTitle: 'Sim',
          cancelTitle: 'Não',
          cancelVariant: 'primary'
        })
        .then(value => {
          if (value) {
            this.ActionDisableNCStatus(itemId).then(() => {
              this.ActionListNCStatus()
              this.$toastr.s('Status excluído')
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
