import services from '@/http'

export const ActionListNCImpactedProcess = ({ commit }, idPayload) => (
  services.ncImpactedProcess.listImpactedProcess({ id: idPayload }).then(res => res.data)
)

export const ActionAddNCImpactedProcess = (context, payload) => (
  services.ncImpactedProcess.addImpactedProcess(payload)
)

export const ActionDisableNCImpactedProcess = ({ commit }, idPayload) => (
  services.ncImpactedProcess.deleteImpactedProcess({ id: idPayload })
)
