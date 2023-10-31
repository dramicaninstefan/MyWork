import React, { Fragment } from 'react'
import { Link } from 'react-router-dom'

import classes from './Footer.module.css'

import logo from '../../assets/logo-light.png'

const Footer = () => {
  return (
    <Fragment>
      <div className={classes.footer} id="footer">
        <div className={classes.container}>
          <div className={classes['left-side']}>
            <img src={logo} alt="logo" />
            <ul>
              <li>
                <Link>
                  <i className="fa-solid fa-location-dot"></i>
                  Pet Centar 65, Srbija
                </Link>
              </li>
              <li>
                <Link>
                  <i className="fa-solid fa-envelope"></i>
                  petcentar013@email.com
                </Link>
              </li>
              <li>
                <Link>
                  <i className="fa-solid fa-phone"></i>
                  +381 65 985 265
                </Link>
              </li>
            </ul>
          </div>
          <div className={classes['right-side']}>
            <div className={classes['right-side-items']}>
              <ul>
                <li>
                  <Link to="usluge">Usluge</Link>
                </li>
                <li>
                  <Link to="/o_nama">Grooming</Link>
                </li>
                <li>
                  <Link to="/veterinar">Veterinar</Link>
                </li>
              </ul>
            </div>
            <div className={classes['right-side-items']}>
              <ul>
                <li>
                  <Link to="/o_nama">O Nama</Link>
                </li>
                <li>
                  <Link to="/galerija">Galerija</Link>
                </li>
                <li>
                  <Link to="/kontakt">Kontakt</Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div className={classes.underfooter}>
          <h1 className={classes.copyright}>Copyright © 2023 Pets Centar 013</h1>

          <div className={classes.social}>
            <a href="https://www.facebook.com/" target="_blank" rel="noreferrer">
              <i className="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/" target="_blank" rel="noreferrer">
              <i className="fa-brands fa-instagram"></i>
            </a>
            <a href="https://twitter.com/" target="_blank" rel="noreferrer">
              <i className="fa-brands fa-twitter"></i>
            </a>
          </div>
        </div>
      </div>
    </Fragment>
  )
}

export default Footer
