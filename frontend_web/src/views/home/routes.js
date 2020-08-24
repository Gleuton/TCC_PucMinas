export default [
  {
    path: '/',
    name: 'home',
    meta: {
      label: 'Home'
    },
    component: () => import(/* webpackChunkName: "Home" */ './Home')
  }
]
