import store from '@/store'

export default req => {
  return ({ status }) => {
    if (status === 401) {
      store.dispatch('auth/ActionSignOut')
    }
  }
}
