export default [
  {
    path: '/nc_type',
    name: 'nc_type',
    meta: {
      label: 'Tipos de não conformidade'
    },
    component: () => import(/* webpackChunkName: "ListNCType" */ './ListNCType')
  },
  {
    path: '/nc_type/cad_form',
    name: 'nc_type/cad_form',
    meta: {
      label: 'Cadastro de tipo da Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  },
  {
    path: '/nc_type/edit_form/:id',
    name: 'nc_type/edit_form',
    meta: {
      label: 'Edição de tipo da Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "EditForm" */ './EditForm')
  }
]
