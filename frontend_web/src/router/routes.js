import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/home'
import { routes as userType } from '../views/user_type'
import { routes as user } from '../views/user'
import { routes as ncType } from '../views/nonconformity/type'
import { routes as ncStatus } from '../views/nonconformity/status'

export default [
  ...auth,
  ...home,
  ...userType,
  ...user,
  ...ncType,
  ...ncStatus
]
