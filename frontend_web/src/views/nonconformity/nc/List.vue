<template>
  <div id="ListNc" class="container-fluid">
    <b-card  class="mt-6" header="Não Conformidades">
      <p>
        <b-button variant="success" @click="cadFrom()">Cadastrar</b-button>
      </p>
      <b-table
      striped
      hover
      show-empty
      :items="listNc"
      :fields="fields"
      >
        <template v-slot:cell(actions)="row">
          <b-button-group size="sm">
            <b-button
              variant="info"
              @click="editForm(row.item.id)"
            >
              <b-icon icon="pencil-square" aria-hidden="true"></b-icon><span>Editar</span>
            </b-button>
            <b-button
              variant="danger"
              @click="disable(row.item.id)"
            >
              <b-icon icon="trash" aria-hidden="true"></b-icon> <span>Excluir</span>
            </b-button>
            <b-button
              variant="primary"
              @click="addProcessNc(row.item.id)"
            >
              <b-icon icon="plus-square" aria-hidden="true"></b-icon> <span>Adicionar Processo</span>
            </b-button>
            <b-button
              variant="secondary"
              @click="reportNc(row.item.id)"
            >
              <b-icon icon="file-earmark-text" aria-hidden="true"></b-icon> <span>Visualizar Processo</span>
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
  name: 'ListNc',
  data () {
    return {
      fields: [
        { key: 'description', sortable: true, label: 'NC' },
        { key: 'process', sortable: true, label: 'Processo' },
        { key: 'user', sortable: true, label: 'Responsável' },
        { key: 'type', sortable: true, label: 'Tipo' },
        { key: 'status', sortable: true, label: 'Status' },
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ]
    }
  },
  mounted () {
    this.ActionListNc()
  },
  computed: {
    ...mapState('nc', ['ncs']),
    listNc () {
      return this.ncs
    }
  },
  methods: {
    ...mapActions('nc', [
      'ActionListNc',
      'ActionDisableNc'
    ]),
    cadFrom () {
      this.$router.replace({ name: 'nc/cad_form' })
    },
    editForm (ncId) {
      this.$router.replace({
        name: 'nc/edit_form',
        params: { id: ncId }
      })
    },
    reportNc (ncId) {
      this.$router.replace({
        name: 'report/nc',
        params: { id: ncId }
      })
    },
    addProcessNc (ncId) {
      this.$router.replace({
        name: 'impacted_process/nc',
        params: { id: ncId }
      })
    },
    disable (ncId) {
      this.$bvModal.msgBoxConfirm(
        'Realmente deseja desativar esta NC?', {
          okVariant: 'danger',
          okTitle: 'Sim',
          cancelTitle: 'Não',
          cancelVariant: 'primary'
        })
        .then(value => {
          this.ActionDisableNc(ncId).then(() => {
            this.ActionListNc()
            this.$toastr.s('NC desativada')
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
