import axios from 'axios'
import { React, useState } from 'react'
import classes from './LoginForm.module.css'
import { TabTitle } from '../../general/GeneralFuntions'

const LoginForm = (props) => {
  TabTitle(`TeslaWays | Login`)

  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')

  function logInHandler(e) {
    e.preventDefault()

    localStorage.setItem('language', 'srb')

    axios
      .post(`http://teslaways.net/api/api/login`, {
        email: email,
        password: password,
      })
      .then((res) => {
        // console.log(res.data.authorisation.token)
        props.onClick(res.data.authorisation.token)
        localStorage.setItem('token', res.data.authorisation.token)
      })
      .catch((err) => {
        console.log(err)
      })
  }

  return (
    <div className={classes.login}>
      <form className={classes.form}>
        Login to admin page
        <input
          type="text"
          className="input"
          placeholder="Email"
          onChange={(e) => {
            setEmail(e.target.value)
          }}
        />
        <input
          type="password"
          className="input"
          placeholder="Password"
          onChange={(e) => {
            setPassword(e.target.value)
          }}
        />
        <button onClick={logInHandler}>Submit</button>
      </form>
    </div>
  )
}

export default LoginForm
