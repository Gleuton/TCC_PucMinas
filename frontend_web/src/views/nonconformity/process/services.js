import * as api from '@/api'

export default {
  listProcess: { method: 'get', url: api.API_NC + 'api/nc_status' }
}
