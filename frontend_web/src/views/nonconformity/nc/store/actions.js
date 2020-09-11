import services from '@/http'
import * as types from './mutation-types'

export const ActionListNc = ({ commit }) => (
  services.nc.list().then(res => {
    commit(types.SET_NC, res.data)
  })
)

export const ActionGetNc = ({ commit }, idPayload) => (
  services.nc.get({ id: idPayload }).then(res => res.data)
)

export const ActionAddNc = (context, payload) => (
  services.nc.add(payload)
)

export const ActionEditNc = (context, payload) => {
  return services.nc.edit({ id: payload.id }, payload.data)
}

export const ActionDisableNc = ({ commit }, idPayload) => (
  services.nc.delete({ id: idPayload })
)
