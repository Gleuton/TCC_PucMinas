import * as types from './mutation-types'
export default {
  [types.SET_NC_IMPACTED_PRECESS] (state, payload) {
    state.impactedProcess = payload
  }
}
