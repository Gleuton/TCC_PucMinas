<template>
  <div id="statusbar">
    <b-navbar toggleable="lg" type="dark" variant="primary">
        <router-link :to="{ name: 'home'}">
          <b-navbar-brand>SGQ-A</b-navbar-brand>
        </router-link>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown right>
              <template v-slot:button-content>
                <em>{{ user.name }}</em>
              </template>
              <b-dropdown-item @click="logout" class="dropdown-item text-center">
                  <b-icon icon="power" aria-hidden="true"></b-icon> Logout
              </b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
  </div>
</template>

<script>
import store from '@/store'
import { mapState } from 'vuex'
export default {
  name: 'statusbar',
  computed: {
    ...mapState('auth', ['user'])
  },
  methods: {
    logout () {
      store.dispatch('auth/ActionSignOut')
      this.$router.replace({ name: 'login' })
    }
  }
}
</script>
<style>
.text-center{
  text-align: center;
}
</style>
