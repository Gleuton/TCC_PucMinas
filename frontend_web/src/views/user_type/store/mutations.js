import * as types from './mutation-types'
export default {
  [types.SET_USER_TYPE] (state, payload) {
    state.userTypes = payload
  }
}
