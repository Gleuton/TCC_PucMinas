export default [
  {
    path: '/nc_status',
    name: 'nc_status',
    meta: {
      label: 'Status de não conformidade'
    },
    component: () => import(/* webpackChunkName: "List" */ './List')
  },
  {
    path: '/nc_status/cad_form',
    name: 'nc_status/cad_form',
    meta: {
      label: 'Cadastro de Status da Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  },
  {
    path: '/nc_status/edit_form/:id',
    name: 'nc_status/edit_form',
    meta: {
      label: 'Edição de Status da Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "EditForm" */ './EditForm')
  }
]
