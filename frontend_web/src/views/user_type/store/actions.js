import services from '@/http'
import * as types from './mutation-types'

export const ActionListUserTypes = ({ commit }) => (
  services.userTypes.listUserTypes().then(res => {
    commit(types.SET_USER_TYPES, res.data)
  })
)

export const ActionGetUserType = ({ commit }, idPayload) => (
  services.userTypes.getUserType({ id: idPayload }).then(res => {
    return res.data
  })
)

export const ActionAddUserTypes = (context, payload) => (
  services.userTypes.addUserTypes(payload)
)
