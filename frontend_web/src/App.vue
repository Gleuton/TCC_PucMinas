<template>
  <div id="app">
    <nav>
      <sidebar/>
    </nav>
    <div id='content'>
      <router-view/>
    </div>
  </div>
</template>

<script>
import sidebar from './views/menu/Menu'
export default {
  name: 'app',
  components: { sidebar }
}
</script>
<style lang="scss">

</style>
