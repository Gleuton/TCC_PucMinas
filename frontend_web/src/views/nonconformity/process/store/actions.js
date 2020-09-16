import services from '@/http'
import * as types from './mutation-types'

export const ActionListNcProcess = ({ commit }) => (
  services.ncProcess.listProcess().then(res => {
    commit(types.SET_NC_PROCESS, res.data)
  })
)
