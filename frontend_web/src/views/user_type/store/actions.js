import services from '@/http'
import * as types from './mutation-types'

export const ActionListUserTypes = ({ commit }) => (
  services.userTypes.listUserTypes().then(res => {
    commit(types.SET_USER_TYPE, res.data)
  })
)

export const ActionAddUserTypes = (context, payload) => (
  services.userTypes.addUserTypes(payload)
)
