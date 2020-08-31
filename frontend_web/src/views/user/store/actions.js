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
