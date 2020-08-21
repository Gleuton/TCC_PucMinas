<template>
  <div id="sidebar">
    <nav v-show="show_menu">
      <ul>
        <li>Tipo de Usuário</li>
        <li>Usuário</li>
        <li>tes</li>
        <li>te</li>
      </ul>
    </nav>
  </div>
</template>

<script>
import store from '@/store'
export default {
  name: 'sidebar',
  computed: {
    show_menu () {
      return store.getters['auth/hasToken']
    }
  }
}
</script>

<style>

</style>
