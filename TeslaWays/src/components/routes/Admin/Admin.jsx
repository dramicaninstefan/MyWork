import { useState } from 'react'

import LoginForm from './LoginForm'
import AdminPage from './AdminPage'

const Admin = () => {
  const [token, setToken] = useState('')

  function LogInValues(token) {
    setToken(token)
  }

  const logInToken = localStorage.getItem('token')

  return <div>{logInToken ? <AdminPage token={token} /> : <LoginForm onClick={LogInValues}></LoginForm>}</div>
}

export default Admin
