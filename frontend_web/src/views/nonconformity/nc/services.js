import * as api from '@/api'

export default {
  list: {
    method: 'get',
    url: api.API_NC + 'api/nonconformity'
  },
  add: {
    method: 'post',
    url: api.API_NC + 'api/nonconformity'
  },
  get: {
    method: 'get',
    url: api.API_NC + 'api/nonconformity{/id}'
  },
  edit: {
    method: 'put',
    url: api.API_NC + 'api/nonconformity{/id}'
  },
  delete: {
    method: 'delete',
    url: api.API_NC + 'api/nonconformity{/id}'
  }
}
