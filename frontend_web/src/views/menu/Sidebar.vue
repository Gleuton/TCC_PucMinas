<template>
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div v-show="isAdmin" id="sidebar-admin">
      <div class="sidebar-heading">Administrador</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Tipo de usuário</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Usuário</a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'home',
  computed: {
    ...mapState('auth', ['user']),
    isAdmin () {
      return this.user.type === 'Administrador'
    }
  }
}
</script>

<style>
#sidebar-wrapper {
  min-height: 100vh;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.575rem 1.25rem;
  font-size: 1.2rem;
}
</style>
