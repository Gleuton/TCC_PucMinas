import * as api from '@/api'

export default {
  listUserTypes: { method: 'get', url: api.API_USER + 'api/user_type' },
  addUserTypes: { method: 'post', url: api.API_USER + 'api/user_type' },
  getUserType: { method: 'get', url: api.API_USER + 'api/user_type{/id}' },
  editUserTypes: { method: 'put', url: api.API_USER + 'api/user_type{/id}' }
}
