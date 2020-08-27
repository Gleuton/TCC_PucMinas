import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/home'
import { routes as userType } from '../views/user_type'
import { routes as user } from '../views/user'

export default [
  ...auth,
  ...home,
  ...userType,
  ...user
]
