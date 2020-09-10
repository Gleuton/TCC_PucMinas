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
      label: 'Cadastro de tipo de Não Conformidade'
    },
    component: () => import(/* webpackChunkName: "CadForm" */ './CadForm')
  }
]
