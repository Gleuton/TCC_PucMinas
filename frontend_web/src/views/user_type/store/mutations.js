import * as types from './mutation-types'
export default {
  [types.SET_USER_TYPE] (state, payload) {
    state.userType = payload
  },
  [types.SET_USER_TYPES] (state, payload) {
    state.userTypes = payload
  }
}
