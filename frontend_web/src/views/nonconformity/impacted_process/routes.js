export default [
  {
    path: '/impacted_process/nc/:id',
    name: 'impacted_process/nc',
    meta: {
      label: 'Processos Impactados'
    },
    component: () => import(/* webpackChunkName: "List" */ './List')
  }
]
