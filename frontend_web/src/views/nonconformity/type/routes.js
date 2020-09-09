export default [
  {
    path: '/nc_type',
    name: 'nc_type',
    meta: {
      label: 'Tipos de não conformidade'
    },
    component: () => import(/* webpackChunkName: "ListNCType" */ './ListNCType')
  }
]
