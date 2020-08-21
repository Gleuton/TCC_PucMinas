<template>
  <div class="home">
    <div class="user-info">
      <h2>Olá, {{ user.name }}</h2>
      <small>Seja bem-vindo ao Sistema de Gestão de Qualidade.</small>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'home',
  computed: {
    ...mapState('auth', ['user'])
  }
}
</script>
<style lang="scss">
.user-info {
  margin-top: 10px;
  text-align: center;
}
</style>
