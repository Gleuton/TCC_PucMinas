import store from '../store'

export default async (to, from, next) => {
  const name = to.meta.label ?? to.name
  document.title = `${name} - SGQ-A`

  if (to.name !== 'login' && !store.getters['auth/hasToken']) {
    try {
      await store.dispatch('auth/ActionCheckToken')
      next({ path: to.path })
    } catch (error) {
      store.dispatch('auth/ActionSignOut')
      next({ name: 'login' })
    }
  }
  next()
}
