<template>
  <div id="sidebar" class="list-group list-group-flush">
    <button @click="toggleSidebar" class="btn-sidebar" :class="{toggleSidebar: !sidebar}">
      <b-icon icon="layout-sidebar-inset" font-scale="2"></b-icon>
    </button>
    <div class="bg-light border-right" id="sidebar-wrapper" :class="{toggleSidebar: sidebar}">
    <div class="sidebar-heading">{{ getUserType }}</div>
    <div class="list-group list-group-flush">
      <div v-show="isAdmin" id="sidebar-admin">
        <router-link
        :to="{ name: 'Tipos de Usuário' }"
        exact
        exact-active-class="active-sidebar"
        class="list-group-item list-group-item-action bg-light">
          Tipo de usuário
        </router-link>
        <router-link
        :to="{ name: 'home' }"
        exact
        exact-active-class="active-sidebar"
        class="list-group-item list-group-item-action bg-light">
          Usuário
        </router-link>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  name: 'sidebar',
  data: () => ({
    sidebar: false
  }),
  computed: {
    ...mapState('auth', ['user']),
    isAdmin () {
      return this.user.type === 'Administrador'
    },
    getUserType () {
      return this.user.type
    }
  },
  methods: {
    toggleSidebar () {
      this.sidebar = !this.sidebar
    }
  }
}
</script>

<style>
  #sidebar .btn-sidebar{
    padding: 4px;
    margin-left: 0;
    text-align: right;
    border: 1px solid #d3d3d3;
    outline-style:none;
    box-shadow:none;
    border-color:transparent;
  }

  #sidebar-wrapper {
    min-height: 91vh;
    margin-left: -15rem;
    transition: margin .25s ease-out;
  }

  #sidebar-wrapper .sidebar-heading {
    padding: 0.875rem 1.25rem;
    font-size: 1.2rem;
  }

  #sidebar-wrapper .list-group {
    width: 15rem;
  }

  #page-content-wrapper {
    min-width: 100vw;
  }

  #sidebar-wrapper.toggleSidebar{
    margin-left: 0;
  }
  #sidebar .active-sidebar {
    color: #36882e;
    border: 1.5px solid #36882e;
  }
  @media (min-width: 994px) {
    #sidebar-wrapper {
      margin-left: 0;
    }

    #sidebar .btn-sidebar{
        display: none;
    }
    #page-content-wrapper {
      min-width: 0;
      width: 100%;
    }

    #sidebar-wrapper #sidebar-wrapper.toggleSidebar{
      margin-left: -15rem;
    }
  }
</style>
