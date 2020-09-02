import services from '@/http'
import * as types from './mutation-types'

export const ActionListUserTypes = ({ commit }) => (
  services.userTypes.listUserTypes().then(res => {
    commit(types.SET_USER_TYPES, res.data)
  })
)

export const ActionGetUserType = ({ commit }, idPayload) => (
  services.userTypes.getUserType({ id: idPayload }).then(res => res.data)
)

export const ActionAddUserType = (context, payload) => (
  services.userTypes.addUserType(payload)
)

export const ActionEditUserType = (context, payload) => {
  return services.userTypes.editUserType({ id: payload.id }, payload.data)
}

export const ActionDisableUserType = ({ commit }, idPayload) => (
  services.userTypes.deleteUserType({ id: idPayload })
)
