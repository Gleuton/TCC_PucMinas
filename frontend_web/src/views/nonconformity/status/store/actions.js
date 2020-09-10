import services from '@/http'
import * as types from './mutation-types'

export const ActionListNCStatus = ({ commit }) => (
  services.ncStatus.listStatus().then(res => {
    commit(types.SET_NC_STATUS, res.data)
  })
)
export const ActionAddNCStatus = (context, payload) => (
  services.ncStatus.addStatus(payload)
)

export const ActionGetNCStatus = ({ commit }, idPayload) => (
  services.ncStatus.getStatus({ id: idPayload }).then(res => res.data)
)

export const ActionEditNC = (context, payload) => {
  return services.ncStatus.editStatus({ id: payload.id }, payload.data)
}

export const ActionDisableNCType = ({ commit }, idPayload) => (
  services.ncStatus.deleteStatus({ id: idPayload })
)
