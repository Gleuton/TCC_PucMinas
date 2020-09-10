import * as api from '@/api'

export default {
  listStatus: { method: 'get', url: api.API_NC + 'api/nc_status' },
  addStatus: { method: 'post', url: api.API_NC + 'api/nc_status' },
  getStatus: { method: 'get', url: api.API_NC + 'api/nc_status{/id}' },
  editStatus: { method: 'put', url: api.API_NC + 'api/nc_status{/id}' },
  deleteStatus: { method: 'delete', url: api.API_NC + 'api/nc_status{/id}' }
}
