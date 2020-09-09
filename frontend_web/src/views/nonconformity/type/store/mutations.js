import * as types from './mutation-types'
export default {
  [types.SET_NC_TYPES] (state, payload) {
    state.ncTypes = payload
  }
}
