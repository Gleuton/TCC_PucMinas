export default [
  {
    path: '/report/nc/:id',
    name: 'report/nc',
    meta: {
      label: 'Relatório'
    },
    component: () => import(/* webpackChunkName: "Detail" */ './Detail')
  }
]
