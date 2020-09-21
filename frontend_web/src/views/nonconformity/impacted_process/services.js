import * as api from '@/api'

export default {
  listImpactedProcess: { method: 'get', url: api.API_NC + 'api/impacted_process/nc{/idNc}' },
  addImpactedProcess: { method: 'post', url: api.API_NC + 'api/impacted_process' },
  deleteImpactedProcess: { method: 'delete', url: api.API_NC + 'api/impacted_process{/id}' }
}
