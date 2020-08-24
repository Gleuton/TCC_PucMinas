import Vue from 'vue'
import VueResource from 'vue-resource'
import interceptors from './interceptors'
import services from './services'

Vue.use(VueResource)
const http = Vue.http

Object.keys(services).map(service => {
  services[service] = Vue.resource('', {}, services[service])
})

http.interceptors.push(interceptors)

const setBearerToken = token => {
  http.headers.common.Authorization = `Bearer ${token}`
}

export default services
export { http, setBearerToken }
