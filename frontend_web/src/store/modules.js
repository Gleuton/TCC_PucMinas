import { store as auth } from '@/modules/auth'
import { store as userType } from '@/views/user_type'
import { store as user } from '@/views/user'
import { store as ncType } from '@/views/nonconformity/type'
import { store as ncStatus } from '@/views/nonconformity/status'

export default {
  auth,
  userType,
  user,
  ncType,
  ncStatus
}
