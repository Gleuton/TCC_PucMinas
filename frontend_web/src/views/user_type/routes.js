export default [
  {
    path: '/user_type',
    name: 'user_type',
    meta: {
      label: 'Tipos de Usuário'
    },
    component: () => import(/* webpackChunkName: "UserType" */ './UserType')
  },
  {
    path: '/user_type/cad_form',
    name: 'user_type/cad_form',
    meta: {
      label: 'Cadastro de Tipos de Usuário'
    },
    component: () => import(/* webpackChunkName: "UserType" */ './CadForm')
  }
]
