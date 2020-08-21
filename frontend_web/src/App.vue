<template>
  <div id="app">
    <div class="d-flex">
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
import sidebar from './views/menu/Sidebar'
export default {
  name: 'app',
  components: { sidebar },
  computed: {
    show_menu () {
      return store.getters['auth/hasToken']
    }
  }
}
</script>
<style lang="scss">
</style>
