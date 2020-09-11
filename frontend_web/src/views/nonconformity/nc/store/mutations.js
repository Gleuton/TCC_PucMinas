import * as types from './mutation-types'
export default {
  [types.SET_NC] (state, payload) {
    state.ncs = payload
  }
}
