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
            @keyup="description_validate()"
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
            @keyup="solution_validate()"
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
            @keyup="standard_validate()"
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
          @change="type_validate()"
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
          @change="status_validate()"
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
          @change="process_validate()"
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
      id: this.$route.params.id,
      form: {
        description: '',
        solution: '',
        standard: '',
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
  created () {
    this.ActionGetNc(this.id).then(res => {
      this.form = res
    })
  },
  mounted () {
    this.ActionListNCTypes()
    this.ActionListNCStatus()
    this.ActionListNcProcess()
  },
  computed: {
    ...mapState('ncType', ['ncTypes']),
    ...mapState('ncStatus', ['ncStatus']),
    ...mapState('ncProcess', ['ncProcess']),
    ...mapState('auth', ['user'])
  },
  methods: {
    ...mapActions('nc', [
      'ActionAddNc'
    ]),
    ...mapActions('nc', [
      'ActionGetNc'
    ]),
    ...mapActions('nc', [
      'ActionEditNc'
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
      if (this.validate()) {
        try {
          await this.ActionEditNc({
            id: this.id,
            data: JSON.stringify(this.form)
          })
          this.$toastr.s('Sucesso ao Cadastrar')
          this.back()
        } catch (error) {
          this.$toastr.e('Erro ao Cadastrar')
        }
      }
    },
    back () {
      this.$router.replace({ name: 'nc' })
    },
    optionsNcType () {
      const options = [
        { value: '', text: 'Selecione um tipo' }
      ]
      let types = this.ncTypes.map((item) => {
        return { value: item.id, text: item.type }
      })

      types = types.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
      return options.concat(types)
    },
    optionsNcStatus () {
      const options = [
        { value: '', text: 'Selecione um Status' }
      ]
      let status = this.ncStatus.map((item) => {
        return { value: item.id, text: item.status }
      })

      status = status.sort((a, b) => {
        if (a.text > b.text) return 1
        if (a.text < b.text) return -1
        return 0
      })
      return options.concat(status)
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
    validate () {
      const description = this.description_validate()
      const solution = this.solution_validate()
      const standard = this.standard_validate()
      const type = this.type_validate()
      const status = this.status_validate()
      const process = this.process_validate()

      return description &&
             solution &&
             standard &&
             type &&
             status &&
             process
    },
    description_validate () {
      this.validation_form.description.valid = true
      if (this.form.description.length >= 255) {
        this.validation_form.description.valid = false
        this.validation_form.description.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.description.length <= 0) {
        this.validation_form.description.valid = false
        this.validation_form.description.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.description.valid
    },
    solution_validate () {
      this.validation_form.solution.valid = true
      if (this.form.solution.length >= 255) {
        this.validation_form.solution.valid = false
        this.validation_form.solution.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.solution.length <= 0) {
        this.validation_form.solution.valid = false
        this.validation_form.solution.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.solution.valid
    },
    standard_validate () {
      this.validation_form.standard.valid = true
      if (this.form.standard.length >= 255) {
        this.validation_form.standard.valid = false
        this.validation_form.standard.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.standard.length <= 0) {
        this.validation_form.standard.valid = false
        this.validation_form.standard.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.standard.valid
    },
    type_validate () {
      this.validation_form.type_id.valid = true
      if (this.form.type_id === '') {
        this.validation_form.type_id.valid = false
        this.validation_form.type_id.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.type_id.valid
    },
    status_validate () {
      this.validation_form.status_id.valid = true
      if (this.form.status_id === '') {
        this.validation_form.status_id.valid = false
        this.validation_form.status_id.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.status_id.valid
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
<style lang="scss">
</style>
