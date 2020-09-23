<template>
  <div id="ReportNc" class="container-fluid">
    <b-card  class="mt-6">
      <div class="button-box">
          <b-button type="button" @click="back()" variant="primary">Voltar</b-button>
          <b-button variant="info" @click="print()">
            <b-icon icon="printer" aria-hidden="true"></b-icon>
            Imprimir
          </b-button>
      </div>
      <div id="reportPrint">
        <h1>Relatório de Não Conformidades</h1>
        <b-card header="Não Conformidade">
          <div class="d-flex flex-row">
            <div class="p-1 w-50">
              <b>Descrição: </b>
              <p>{{ nc.description }}</p>
            </div>
            <div class="p-1 w-50">
              <b>Solução Proposta: </b>
              <p>{{ nc.solution }}</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="p-1 w-50">
              <b>Regra: </b>
              <p>{{ nc.standard }}</p>
            </div>
            <div class="p-1 w-50">
              <b>Processo Principal: </b>
              <p>{{ nc.process }}</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="p-1 w-50">
              <p><b>Tipo: </b> {{ nc.type }}</p>
            </div>
            <div class="p-1 w-50">
              <p><b>Status: </b>{{ nc.status }}</p>
            </div>
          </div>
          <div class="d-flex flex-row">
            <div class="p-1 w-50">
              <p> <b>Responsável: </b> {{ nc.user }}
              </p>
            </div>
            <div class="p-1 w-50">
              <p> <b>Reportada em: </b> {{ createdAt }}</p>
            </div>
          </div>
        </b-card>
        <hr>
        <b-card header="Processos Impactados">
          <b-table
          striped
          hover
          show-empty
          :items="listImpactedProcess"
          :fields="fields"
          >
          </b-table>
        </b-card>
      </div>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  name: 'ReportNc',
  data () {
    return {
      id: this.$route.params.id,
      fields: [
        { key: 'process', sortable: false, label: 'Processo' }
      ],
      nc: {
        description: '',
        process: '',
        type: '',
        status: ''
      },
      impactedProcess: []
    }
  },
  created () {
    this.ActionListNCImpactedProcess(this.id).then(res => {
      this.impactedProcess = res
    })
    this.ActionGetNc(this.id).then(res => {
      this.nc = res
    })
  },
  computed: {
    ...mapState('ncImpactedProcesses', ['ncImpactedProcess']),
    listImpactedProcess () {
      return this.impactedProcess
    },
    createdAt () {
      const date = new Date(this.nc.created_at)
      return date.getDate().toString().padStart(2, '0') + '/' + date.getMonth().toString().padStart(2, '0') + '/' + date.getFullYear()
    }
  },
  methods: {
    ...mapActions('nc', ['ActionGetNc']),
    ...mapActions('ncImpactedProcess', [
      'ActionListNCImpactedProcess'
    ]),
    back () {
      this.$router.replace({ name: 'nc' })
    },
    print () {
      // Pass the element id here
      this.$htmlToPaper('reportPrint')
    }
  }
}
</script>

<style>
  #ReportNc p{
    text-align: justify;
  }
  #ReportNc h1{
    text-align: center;
    font-size: 30px;
    font-weight: bold;
  }
</style>
