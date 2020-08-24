import * as api from '@/api'

export default {
  login: { method: 'post', url: api.API_USER + 'login' },
  loadSession: { method: 'get', url: api.API_USER + 'api/load-session' }
}
