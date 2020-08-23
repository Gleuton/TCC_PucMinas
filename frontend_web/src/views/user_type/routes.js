export default [
  {
    path: '/user_type',
    name: 'Tipos de Usuário',
    component: () => import(/* webpackChunkName: "UserType" */ './UserType')
  }
]
