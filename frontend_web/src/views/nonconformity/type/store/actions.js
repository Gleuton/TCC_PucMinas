import services from '@/http'
import * as types from './mutation-types'

export const ActionListNCTypes = ({ commit }) => (
  services.ncTypes.listNCTypes().then(res => {
    commit(types.SET_NC_TYPES, res.data)
  })
)
