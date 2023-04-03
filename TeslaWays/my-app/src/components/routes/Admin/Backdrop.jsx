import React from 'react'
import axios from 'axios'
import classes from './Backdrop.module.css'

const Backdrop = (props) => {
  const tokenRef = localStorage.getItem('token')

  function tokenRefresh() {
    axios
      .post(
        `http://teslaways.net/api/api/refresh`,
        {},
        {
          headers: {
            Authorization: 'Bearer ' + tokenRef,
          },
        }
      )
      .then((res) => {
        console.log(res.data)
        localStorage.removeItem('token')
        localStorage.setItem('token', res.data.authorisation.token)
        window.location.reload()
      })
      .catch((err) => {
        console.log(err)
      })
  }

  return (
    <div className={classes.backdrop}>
      <div className={classes.box}>
        <h2>OBAVEŠTENJE!</h2>
        <p className={classes.info}>
          Vaše vreme za rad ističe za 10 minuta. Klikom na PRODUŽI produžite vreme. Unete vrednosti će biti
          obrisane.
        </p>
        <p className={classes.warrning}>
          Klikom na ODUSTANI, nakon 10 minuta će se ne sačuvani podaci obrisati i bićete automatski
          izlogovani.
        </p>
        <div className={classes.buttons}>
          <button
            className={classes.btn}
            onClick={() => {
              tokenRefresh()
              props.backdrop()
            }}
          >
            OBNOVI<i className="fa-solid fa-arrows-rotate"></i>
          </button>
          <button className={classes.btn} onClick={props.backdrop}>
            ODUSTANI<i className="fa-solid fa-xmark"></i>
          </button>
        </div>
      </div>
    </div>
  )
}

export default Backdrop
