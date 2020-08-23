import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/home'
import { routes as userType } from '../views/user_type'

export default [
  ...auth,
  ...home,
  ...userType
]
