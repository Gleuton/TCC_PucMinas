import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/home'

export default [
  ...auth,
  ...home
]
