import { services as auth } from '@/modules/auth'
import { services as userTypes } from '@/views/user_type'
import { services as user } from '@/views/user'
import { services as ncTypes } from '@/views/nonconformity/type'
import { services as ncStatus } from '@/views/nonconformity/status'

export default {
  auth,
  userTypes,
  user,
  ncTypes,
  ncStatus
}
