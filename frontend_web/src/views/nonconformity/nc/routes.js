export default [
  {
    path: '/nc',
    name: 'nc',
    meta: {
      label: 'Não Conformidades'
    },
    component: () => import(/* webpackChunkName: "List" */ './List')
  },
  {
    path: '/nc/cad_form',
    name: 'nc/cad_form',
    meta: {
      label: 'Cadastro de Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  },
  {
    path: '/nc/edit_form/:id',
    name: 'nc/edit_form',
    meta: {
      label: 'Editar Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "EditForm" */ './EditForm')
  }
]
