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
      label: 'Cadastro de Tipo de Usuário'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  },
  {
    path: '/user_type/edit_form/:id',
    name: 'user_type/edit_form',
    meta: {
      label: 'Edição de Tipo de Usuário'
    },
    component: () => import(/* webpackChunkName: "EditForm" */ './EditForm')
  }
]
