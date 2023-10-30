import { Fragment } from 'react'
import { Link } from 'react-router-dom'

import classes from './Footer.module.css'

const Footer = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.social}>
          <a href="viber://chat/?number=+38166332095" target="_blank" rel="noreferrer">
            <div className={classes.viber}>
              <i className="fa-brands fa-viber"></i>
            </div>
          </a>
          <a href="https://wa.me/+38166332095" target="_blank" rel="noreferrer">
            <div className={classes.whatsapp}>
              <i className="fa-brands fa-whatsapp"></i>
            </div>
          </a>
          <a href="https://www.instagram.com/" target="_blank" rel="noreferrer">
            <div className={classes.instagram}>
              <i className="fa-brands fa-instagram"></i>
            </div>
          </a>
          <a href="https://www.facebook.com/" target="_blank" rel="noreferrer">
            <div className={classes.facebook}>
              <i className="fa-brands fa-facebook-f"></i>
            </div>
          </a>
        </div>
        <div className={classes.links}>
          <Link to="/">Početna</Link>
          <Link to="/o_nama">O Nama</Link>
          <Link to="/galerija">Galerija</Link>
          <Link to="/kontakt">Kontakt</Link>
        </div>
        <div className={classes.info}>
          <a
            href="https://www.google.com/maps/place/%C5%BDarka+Zrenjanina+36,+Star%C4%8Devo/@44.8111453,20.6915838,17z/data=!3m1!4b1!4m5!3m4!1s0x4750826fb8ebbb11:0x3027f19070931e25!8m2!3d44.8111453!4d20.6941641?entry=ttu"
            target="_blank"
            rel="noreferrer"
            className={classes.adress}
          >
            <i className="fa-solid fa-location-dot"></i>Žarka Zrenjanina 36, Starčevo
          </a>
          <a href="tel:+38166332095" className={classes.phone}>
            <i className="fa-solid fa-phone"></i>+381 66 332 095
          </a>
        </div>
        <div className={classes.copyright}>&copy; Copyright 2023</div>
      </div>
    </Fragment>
  )
}

export default Footer
