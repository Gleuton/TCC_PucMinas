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
  },
  {
    path: '/user/edit_form/:id',
    name: 'user/edit_form',
    meta: {
      label: 'Editar Usuário'
    },
    component: () => import(/* webpackChunkName: "EditForm" */ './EditForm')
  }
]
