import Vue from 'vue'
import VueResource from 'vue-resource'

Vue.use(VueResource)
const http = Vue.http

http.options.root = 'http://localhost:8901'

export { http }
