<template>
  <div>

    <span v-b-toggle.sidebar class="material-icons md-48 menu_open">
      menu_open
    </span>
    <b-sidebar id="sidebar" sidebar-class="border-right" title="SGQ-A">
      <div v-show="isAdmin" id="sidebar-admin">
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action bg-light">Tipo de usuário</a>
          <a href="#" class="list-group-item list-group-item-action bg-light">Usuário</a>
        </div>
      </div>
    </b-sidebar>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'sidebar',
  computed: {
    ...mapState('auth', ['user']),
    isAdmin () {
      return this.user.type === 'Administrador'
    },
    userType () {
      return this.user.type
    }
  }
}
</script>

<style>
span.menu_open{
  outline:none;
  margin: 10px;
  border: 1px solid #000;
  border-radius: 2px;
  width: 50px;
}
</style>
