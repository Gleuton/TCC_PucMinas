import * as api from '@/api'

export default {
  listUserTypes: { method: 'get', url: api.API_USER + 'api/user_type' },
  addUserTypes: { method: 'post', url: api.API_USER + 'api/user_type' }
}
