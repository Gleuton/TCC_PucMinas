export default [
  {
    path: '/user',
    name: 'user',
    meta: {
      label: 'Usuários'
    },
    component: () => import(/* webpackChunkName: "ListUser" */ './ListUser')
  },
  {
    path: '/user/cad_form',
    name: 'user/cad_form',
    meta: {
      label: 'Cadastro de Usuário'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  }
]
