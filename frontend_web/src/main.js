import Vue from 'vue'
import App from '@/App'
import { BootstrapVue } from 'bootstrap-vue'
import router from '@/router'
import store from '@/store'

import './assets/css/app.scss'

Vue.config.productionTip = false

Vue.use(BootstrapVue)

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
