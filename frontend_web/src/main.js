import Vue from 'vue'
import App from '@/App'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import router from '@/router'
import store from '@/store'
import VueToastr from 'vue-toastr'
import VueHtmlToPaper from 'vue-html-to-paper'

import './assets/css/app.scss'

const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
  ]
}

Vue.config.productionTip = false

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueHtmlToPaper, options)
Vue.use(VueToastr, {
  defaultPosition: 'toast-top-center'
})

window._Vue = new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
