<template>

  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
export default {
  name: 'selectUserType',
  props: {
    selected: {
      required: false
    }
  },
  mounted () {
    this.ActionListUserTypes()
  },
  computed: {
    ...mapState('userType', ['userTypes'])
  },
  methods: {
    ...mapActions('userType', [
      'ActionListUserTypes'
    ]),
    optionsUserType () {
      const types = this.userTypes.map((item) => {
        return { value: item.id, text: item.type }
      })
      types.push(
        { value: '', text: 'Selecione um tipo' }
      )
      return types
    }
  }
}
</script>
