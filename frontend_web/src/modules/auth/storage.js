import { setBearerToken } from '@/http'

export const setHeaderToken = token => setBearerToken(token)
export const getLocalToken = () => localStorage.getItem('api_token')
export const deleteLocalToken = () => localStorage.removeItem('api_token')
export const setLocalToken = token => localStorage.setItem('api_token', token)
