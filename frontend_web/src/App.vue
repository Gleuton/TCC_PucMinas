<template>
  <div id="app">
    <div class="d-flex flex-row">
      <div class="p-0 w-100" v-show="show_menu">
        <statusbar/>
      </div>
    </div>
    <div class="d-flex flex-row">
      <div class="p-0" v-show="show_menu">
          <sidebar/>
      </div>
      <div class="p-0 w-100">
        <router-view/>
      </div>
    </div>
  </div>
</template>

<script>
import store from '@/store'
import sidebar from './components/menu/Sidebar'
import statusbar from './components/menu/Statusbar'
export default {
  name: 'app',
  components: { sidebar, statusbar },
  computed: {
    show_menu () {
      return store.getters['auth/hasToken'] || this.$route.name !== 'login'
    }
  }
}
</script>
<style lang="scss">
</style>
