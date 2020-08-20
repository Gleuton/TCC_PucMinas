import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'
import beforeEach from './beforeEach'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes
})

router.beforeEach(beforeEach)

export default router
