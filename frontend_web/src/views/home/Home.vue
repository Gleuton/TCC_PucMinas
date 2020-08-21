<template>
  <div class="home">
    <div class="user-info">
      <h2>Olá, {{ user.name }}</h2>
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
