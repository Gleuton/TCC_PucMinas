import * as api from '@/api'

export default {
  listTypes: { method: 'get', url: api.API_NC + 'api/nc_type' },
  addType: { method: 'post', url: api.API_NC + 'api/nc_type' }
}
