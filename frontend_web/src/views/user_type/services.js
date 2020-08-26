import * as api from '@/api'

export default {
  listUserTypes: { method: 'get', url: api.API_USER + 'api/user_type' },
  addUserType: { method: 'post', url: api.API_USER + 'api/user_type' },
  getUserType: { method: 'get', url: api.API_USER + 'api/user_type{/id}' },
  editUserType: { method: 'put', url: api.API_USER + 'api/user_type{/id}' },
  deleteUserType: { method: 'delete', url: api.API_USER + 'api/user_type{/id}' }
}
