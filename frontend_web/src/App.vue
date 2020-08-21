<template>
  <div id="app">
    <div class="d-flex">
      <div class="p-0">
        <sidebar/>
      </div>
      <div class="p-0 w-100">
        <router-view/>
      </div>
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
