import * as types from './mutation-types'
export default {
  [types.SET_NC_PROCESS] (state, payload) {
    state.ncProcess = payload
  }
}
