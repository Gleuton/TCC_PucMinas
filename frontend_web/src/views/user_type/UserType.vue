<template>
  <div id="UserType">
    <div class="user-info">
      <h2>Tipos de Usuário</h2><b-button>Cadastrar</b-button>
      <b-table striped hover :items="listUserTypes"></b-table>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  name: 'UserType',
  mounted () {
    this.ActionListUserTypes()
  },
  computed: {
    ...mapState('userType', ['userTypes']),
    listUserTypes () {
      return this.userTypes.map(function (el) {
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
</style>
