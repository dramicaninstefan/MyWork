import { React, useState } from 'react'
import axios from 'axios'
import classes from './AdminPage.module.css'
import Novosti from './Novosti/Novosti.jsx'
import Destinacije from './Destinacije/Destinacije'
import logoImage from '../../../assets/logo.png'
import Zone from './Zone/Zone'
import Backdrop from './Backdrop'
import Jezik from './Jezik'
import { TabTitle } from '../../general/GeneralFuntions'

const AdminPage = () => {
  TabTitle(`TeslaWays | Admin`)

  const [backdrop, setBackdrop] = useState(false)

  setTimeout(() => {
    setBackdrop(true)
  }, 2700000)

  function backdropOpen() {
    setBackdrop(true)
  }
  function backdropClose() {
    setBackdrop(false)
    setTimeout(() => {
      localStorage.removeItem('token')
      window.location.reload()
    }, 600000)
  }

  const tokenLogout = localStorage.getItem('token')
  // console.log('Bearer ' + tokenLogout)

  // function refreshConfirm() {
  //   var confirm = window.confirm('Vasa autorizacija istice za 10 minuta. Klikom na OK produzite vasu sesiju.')
  //   console.log(confirm)
  //   if (confirm === true) {
  //     tokenRefresh()
  //   } else {
  //     window.alert('Nakon 10 minuta uneti podaci ce biti izgubljeni i bicete izlogovani!!!')
  //   }
  // }

  function logOutHandler() {
    axios
      .post(
        `http://teslaways.net/api/api/logout`,
        {},
        {
          headers: {
            Authorization: 'Bearer ' + tokenLogout,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        localStorage.removeItem('token')
        localStorage.setItem('language', 'srb')
        window.location.reload()
      })
      .catch((err) => {
        localStorage.removeItem('token')
        localStorage.setItem('language', 'srb')
        window.location.reload()
      })

    // localStorage.removeItem('token')
    // window.location.reload()
  }

  return (
    <div>
      <div className={classes.sidebar}>
        <img className={classes.logo} src={logoImage} alt="Logo" />
        <div className={classes.links}>
          <a className={classes.link} href="#jezik">
            Jezik
          </a>
          <a className={classes.link} href="#novosti">
            Vesti
          </a>
          <a className={classes.link} href="#destinacije">
            Destinacije
          </a>
          <a className={classes.link} href="#zone">
            Zone
          </a>
        </div>
        <button className={classes.logoutBtn} onClick={backdropOpen}>
          Open
        </button>
        <button className={classes.logoutBtn} onClick={logOutHandler}>
          Log out <i className="fa-solid fa-arrow-right-from-bracket"></i>
        </button>
        {/* <button onClick={tokenRefresh}>Refresh</button>
        <button onClick={refreshConfirm}>Confirm PopOut</button> */}
      </div>
      <div className={classes.main}>
        <Jezik />
        <Novosti />
        <Destinacije />
        <Zone />
        {backdrop ? <Backdrop backdrop={backdropClose} /> : null}
      </div>
    </div>
  )
}

export default AdminPage
