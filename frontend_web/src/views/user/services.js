import * as api from '@/api'

export default {
  listUsers: { method: 'get', url: api.API_USER + 'api/user' },
  addUser: { method: 'post', url: api.API_USER + 'api/user' }
}
