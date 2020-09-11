<template>
  <div id="NcStatus" class="container-fluid">
    <b-card  class="mt-6" header="Editar tipo de não conformidade">
      <b-form @submit="onSubmit">
        <b-form-group
          id="input-group-type"
          label="Status da NC:"
          label-for="status"
        >
          <b-form-input
            id="status"
            v-model="form.status"
            type="text"
            @keyup="valid_status()"
            placeholder="Status da não conformidade"
          ></b-form-input>
          <small class="input-error" v-if="!validation_form.status.valid">
            {{ validation_form.status.message }}
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
import { mapActions } from 'vuex'
export default {
  name: 'NcStatus',
  data () {
    return {
      id: this.$route.params.id,
      form: {
        status: ''
      },
      validation_form: {
        status: {
          valid: true,
          message: ''
        }
      }
    }
  },
  created () {
    this.ActionGetNCStatus(this.id).then(res => {
      this.form.status = res.status
    })
  },
  methods: {
    ...mapActions('ncStatus', [
      'ActionGetNCStatus',
      'ActionEditNCStatus'
    ]),
    async onSubmit (evt) {
      evt.preventDefault()
      if (this.valid_status()) {
        try {
          await this.ActionEditNCStatus({
            id: this.id,
            data: JSON.stringify(this.form)
          })
          this.$toastr.s('Sucesso ao Editar')
          this.back()
        } catch (error) {
          console.log(error)
          this.$toastr.e('Erro ao Editar')
        }
      }
    },
    back () {
      this.$router.replace({ name: 'nc_status' })
    },
    valid_status () {
      this.validation_form.status.valid = true
      if (this.form.status.length >= 255) {
        this.validation_form.status.valid = false
        this.validation_form.status.message = 'Este campo deve ser menor que 255 caracteres.'
      }
      if (this.form.status.length <= 0) {
        this.validation_form.status.valid = false
        this.validation_form.status.message = 'Este campo é obrigatório.'
      }
      return this.validation_form.status.valid
    }
  }
}
</script>
<style lang="scss">

</style>
