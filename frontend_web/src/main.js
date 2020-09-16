import Vue from 'vue'
import App from '@/App'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import router from '@/router'
import store from '@/store'
import VueToastr from 'vue-toastr'

import './assets/css/app.scss'

Vue.config.productionTip = false

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

Vue.use(VueToastr, {
  defaultPosition: 'toast-top-center'
})

window._Vue = new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
