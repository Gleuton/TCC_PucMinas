import services from '@/http'
import * as types from './mutation-types'

export const ActionListNCTypes = ({ commit }) => (
  services.ncTypes.listTypes().then(res => {
    commit(types.SET_NC_TYPES, res.data)
  })
)
export const ActionAddNCType = (context, payload) => (
  services.ncTypes.addType(payload)
)

export const ActionGetNCType = ({ commit }, idPayload) => (
  services.ncTypes.getType({ id: idPayload }).then(res => res.data)
)

export const ActionEditNCType = (context, payload) => {
  return services.ncTypes.editType({ id: payload.id }, payload.data)
}
