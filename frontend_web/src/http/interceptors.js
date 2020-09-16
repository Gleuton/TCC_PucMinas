import store from '@/store'

export default req => {
  return ({ status }) => {
    if (status === 401 || status === 403) {
      store.dispatch('auth/ActionSignOut')
      window._Vue.$router.push({ name: 'login' })
    }
  }
}
