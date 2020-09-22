<template>
  <div id="ImpactedProcess" class="container-fluid">
    <b-card  class="mt-6" header="Processos impactados">
      <b-card>
        <b-form-group
          id="input-group-description"
          label="Não Conformidade:"
          label-for="description"
        >
          <b-form-input
            id="description"
            v-model="this.nc.description"
            type="text"
            disabled
          ></b-form-input>

        </b-form-group>
        <b-form-group
          id="input-group-process"
          label="Processo Principal:"
          label-for="process"
        >
          <b-form-input
            id="process"
            v-model="this.nc.process"
            type="text"
            disabled
          ></b-form-input>
        </b-form-group>

        <b-form-group
          id="input-group-type"
          label="Tipo da NC:"
          label-for="type"
        >
          <b-form-input
            id="type"
            v-model="this.nc.type"
            type="text"
            disabled
          ></b-form-input>
        </b-form-group>

      <b-form-group
          id="input-group-status"
          label="Status da NC:"
          label-for="status"
        >
          <b-form-input
            id="status"
            v-model="this.nc.status"
            type="text"
            disabled
          ></b-form-input>
        </b-form-group>
      </b-card>
      <b-card>
        <b-form-group
          id="input-group-process"
          label="Processo Impactado:"
          label-for="process"
        >
          <b-form-select
          id="select_process"
          v-model="form.process_id"
          :options="optionsNcProcess()"
          @change="process_validate()"
          ></b-form-select>
          <small class="input-error" v-if="!validation_form.process_id.valid">
            {{ validation_form.process_id.message }}
          </small>
        </b-form-group>
                <div class="button-box">
          <b-button type="button" @click="back()" variant="primary">Voltar</b-button>
          <b-button variant="success" @click="addProcess()">Adicionar</b-button>
        </div>
      </b-card>
      <b-card>
        <h4>Processos Impactados</h4>
        <b-table striped hover
        show-empty
        :items="listImpactedProcess"
        :fields="fields"
        >
          <template v-slot:cell(actions)="row">
            <b-button-group size="sm">
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
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  name: 'ImpactedProcess',

  data () {
    return {
      idNc: this.$route.params.id,
      fields: [
        { key: 'process', sortable: true, label: 'Processo' },
        { key: 'actions', label: 'Ações', class: 'text-center' }
      ],
      nc: {
        description: '',
        process: '',
        type: '',
        status: ''
      },
      impactedProcess: [],
      form: {
        process_id: '',
        nonconformity_id: this.$route.params.id
      },
      validation_form: {
        process_id: {
          valid: true,
          message: ''
        }
      }
    }
  },
  created () {
    this.getNCImpactedProcess()
    this.ActionGetNc(this.idNc).then(res => {
      this.nc = res
    })
    this.ActionListNcProcess()
  },
  computed: {
    ...mapState('ncImpactedProcesses', ['ncImpactedProcess']),
    ...mapState('ncProcess', ['ncProcess']),
    listImpactedProcess () {
      return this.impactedProcess
    }
  },
  methods: {
    ...mapActions('nc', ['ActionGetNc']),
    ...mapActions('ncImpactedProcess', [
      'ActionListNCImpactedProcess',
      'ActionAddNCImpactedProcess',
      'ActionDisableNCImpactedProcess'
    ]),
    ...mapActions('ncProcess', ['ActionListNcProcess']),
    getNCImpactedProcess () {
      this.ActionListNCImpactedProcess(this.idNc).then(res => {
        this.impactedProcess = res
      })
    },
    optionsNcProcess () {
      const options = [
        { value: '', text: 'Selecione um Processo' }
      ]
      let process = this.ncProcess.map((item) => {
        return { value: item.id, text: item.name }
      })
      process = process.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
      return options.concat(process)
    },
    async addProcess () {
      if (this.process_validate()) {
        try {
          await this.ActionAddNCImpactedProcess(
            JSON.stringify(this.form)
          )
          this.$toastr.s('Processo adicionado')
          this.getNCImpactedProcess()
        } catch (error) {
          this.$toastr.e('Erro ao Adicionar')
        }
      }
    },
    disable (itemId) {
      this.$bvModal.msgBoxConfirm(
        'Realmente deseja excluir este processo?', {
          okVariant: 'danger',
          okTitle: 'Sim',
          cancelTitle: 'Não',
          cancelVariant: 'primary'
        })
        .then(value => {
          if (value) {
            this.ActionDisableNCImpactedProcess(itemId).then(() => {
              this.getNCImpactedProcess()
              this.$toastr.s('Processo excluído')
            })
          }
        })
        .catch(err => {
          console.log(err)
        })
    },
    process_validate () {
      this.validation_form.process_id.valid = true
      if (this.form.process_id === '') {
        this.validation_form.process_id.valid = false
        this.validation_form.process_id.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.process_id.valid
    }
  }
}
</script>
