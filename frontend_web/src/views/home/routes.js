export default [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "Home" */ './Home')
  }
]
