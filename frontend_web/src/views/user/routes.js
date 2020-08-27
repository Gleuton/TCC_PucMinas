export default [
  {
    path: '/user',
    name: 'user',
    meta: {
      label: 'Usuários'
    },
    component: () => import(/* webpackChunkName: "ListUser" */ './ListUser')
  }
]
