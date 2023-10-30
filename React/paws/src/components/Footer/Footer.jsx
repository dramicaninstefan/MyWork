import { Fragment } from 'react'
import { Link } from 'react-router-dom'

import classes from './Footer.module.css'

const Footer = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.social}>
          <a href="https://www.instagram.com/" target="_blank">
            <div className={classes.instagram}>
              <i className="fa-brands fa-instagram"></i>
            </div>
          </a>
          <a href="https://www.facebook.com/" target="_blank">
            <div className={classes.facebook}>
              <i className="fa-brands fa-facebook-f"></i>
            </div>
          </a>
          <a href="https://twitter.com/" target="_blank">
            <div className={classes.twitter}>
              <i className="fa-brands fa-twitter"></i>
            </div>
          </a>
        </div>
        <div className={classes.links}>
          <Link to="/">Početna</Link>
          <Link to="/o_nama">O Nama</Link>
          <Link to="/galerija">Galerija</Link>
          <Link to="/kontakt">Kontakt</Link>
        </div>
        <div className={classes.copyright}>&copy; Copyright 2023</div>
      </div>
    </Fragment>
  )
}

export default Footer
