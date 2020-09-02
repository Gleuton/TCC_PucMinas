import services from '@/http'
import * as types from './mutation-types'

export const ActionListUsers = ({ commit }) => (
  services.user.listUsers().then(res => {
    commit(types.SET_USER, res.data)
  })
)

export const ActionAddUser = (context, payload) => (
  services.user.addUser(payload)
)

export const ActionGetUser = ({ commit }, idPayload) => (
  services.user.getUser({ id: idPayload }).then(res => res.data)
)

export const ActionEditUser = (context, payload) => {
  console.log(payload)
  return services.user.editUser({ id: payload.id }, payload.data)
}
