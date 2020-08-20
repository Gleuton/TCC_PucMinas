import Vue from 'vue'
import { http as httpAuth } from '../modules/auth/http'
import services from './services'

Object.keys(services).map(service => {
  services[service] = Vue.resource('', {}, services[service])
})

const setBearerToken = token => {
  httpAuth.headers.common.Authorization = `Bearer ${token}`
}

export default services
export { httpAuth, setBearerToken }
