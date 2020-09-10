import * as types from './mutation-types'
export default {
  [types.SET_NC_STATUS] (state, payload) {
    state.ncStatus = payload
  }
}
