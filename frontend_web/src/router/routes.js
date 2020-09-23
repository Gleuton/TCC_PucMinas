import { routes as auth } from '../modules/auth'
import { routes as home } from '../views/home'
import { routes as userType } from '../views/user_type'
import { routes as user } from '../views/user'
import { routes as ncType } from '../views/nonconformity/type'
import { routes as ncStatus } from '../views/nonconformity/status'
import { routes as nc } from '../views/nonconformity/nc'
import { routes as ncImpactedProcess } from '../views/nonconformity/impacted_process'
import { routes as ncReport } from '../views/nonconformity/report'

export default [
  ...auth,
  ...home,
  ...userType,
  ...user,
  ...ncType,
  ...ncStatus,
  ...ncImpactedProcess,
  ...ncReport,
  ...nc
]
