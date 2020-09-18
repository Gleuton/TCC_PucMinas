<template>
  <div id="NCcad" class="container-fluid">
    <b-card  class="mt-6" header="Cadastrar usuário">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-description"
          label="Não Conformidade:"
          label-for="description"
        >
          <b-form-input
            id="description"
            v-model="form.description"
            type="text"
            @keyup="()=>{}"
            placeholder="Não Conformidade"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.description.valid">
            {{ validation_form.description.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-solution"
          label="Solução proposta:"
          label-for="solution"
        >
          <b-form-input
            id="solution"
            v-model="form.solution"
            type="text"
            @keyup="()=>{}"
            placeholder="Solução proposta"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.solution.valid">
            {{ validation_form.solution.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-standard"
          label="Norma em divergência:"
          label-for="standard"
        >
          <b-form-input
            id="standard"
            v-model="form.standard"
            type="text"
            @keyup="()=>{}"
            placeholder="Norma em divergência"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.standard.valid">
            {{ validation_form.standard.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-type"
          label="Tipo da Nc:"
          label-for="types"
        >
          <b-form-select
          id="types"
          v-model="form.type_id"
          :options="optionsNcType()"
          @change="() => {}"
          ></b-form-select>
          <small class="input-error" v-if="!validation_form.type_id.valid">
            {{ validation_form.type_id.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-status"
          label="Status da Nc:"
          label-for="status"
        >
          <b-form-select
          id="status"
          v-model="form.status_id"
          :options="optionsNcStatus()"
          @change="() => {}"
          ></b-form-select>
          <small class="input-error" v-if="!validation_form.status_id.valid">
            {{ validation_form.status_id.message }}
          </small>
        </b-form-group>

        <b-form-group
          id="input-group-process"
          label="Processo:"
          label-for="process"
        >
          <b-form-select
          id="process"
          v-model="form.process_id"
          :options="optionsNcProcess()"
          @change="() => {}"
          ></b-form-select>
          <small class="input-error" v-if="!validation_form.process_id.valid">
            {{ validation_form.process_id.message }}
          </small>
        </b-form-group>

        <div class="button-box">
          <b-button type="button" @click="back()" variant="primary">Voltar</b-button>
          <b-button type="submit" variant="success">Salvar</b-button>
        </div>
      </b-form>
    </b-card>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  name: 'NCcad',
  data () {
    return {
      form: {
        description: '',
        solution: '',
        user_id: '',
        type_id: '',
        status_id: '',
        process_id: ''
      },
      validation_form: {
        description: {
          valid: true,
          message: ''
        },
        solution: {
          valid: true,
          message: ''
        },
        standard: {
          valid: true,
          message: ''
        },
        type_id: {
          valid: true,
          message: ''
        },
        status_id: {
          valid: true,
          message: ''
        },
        process_id: {
          valid: true,
          message: ''
        }
      }
    }
  },
  mounted () {
    this.ActionListNCTypes()
    this.ActionListNCStatus()
    this.ActionListNcProcess()
  },
  computed: {
    ...mapState('ncType', ['ncTypes']),
    ...mapState('ncStatus', ['ncStatus']),
    ...mapState('ncProcess', ['ncProcess'])
  },
  methods: {
    ...mapActions('nc', [
      'ActionAddNc'
    ]),
    ...mapActions('ncType', [
      'ActionListNCTypes'
    ]),
    ...mapActions('ncStatus', [
      'ActionListNCStatus'
    ]),
    ...mapActions('ncProcess', [
      'ActionListNcProcess'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
    },
    back () {
      this.$router.replace({ name: 'nc' })
    },
    optionsNcType () {
      const types = this.ncTypes.map((item) => {
        return { value: item.id, text: item.type }
      })
      types.push(
        { value: '', text: 'Selecione um tipo' }
      )
      return types.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
    },
    optionsNcStatus () {
      const status = this.ncStatus.map((item) => {
        return { value: item.id, text: item.status }
      })
      status.push(
        { value: '', text: 'Selecione um Status' }
      )
      return status.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
    },
    optionsNcProcess () {
      const process = this.ncProcess.map((item) => {
        return { value: item.id, text: item.process }
      })
      process.push(
        { value: '', text: 'Selecione um Processo' }
      )
      return process.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
    }
  }
}
</script>
<style lang="scss">
</style>
