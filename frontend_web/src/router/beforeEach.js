import store from '../store'

export default async (to, from, next) => {
  document.title = `${to.name} - SGQ-A`

  if (to.name !== 'login' && !store.getters['auth/hasToken']) {
    try {
      await store.dispatch('auth/ActionCheckToken')
      next({ name: to.name })
    } catch (error) {
      store.dispatch('auth/ActionSignOut')
      next({ name: 'login' })
    }
  }
  next()
}
