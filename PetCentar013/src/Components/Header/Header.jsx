import React, { Fragment } from 'react'
import { NavLink } from 'react-router-dom'

import classes from './Header.module.css'

import logo from '../../assets/logo.png'

const Header = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.links}>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
            <i className="fa-solid fa-paw"></i>Početna
          </NavLink>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/o_nama" end>
            <i className="fa-solid fa-paw"></i>O Nama
          </NavLink>
        </div>
        <div className={classes.logo}>
          <img src={logo} alt="logo" />
        </div>
        <div className={classes.links}>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/galerija" end>
            <i className="fa-solid fa-paw"></i>Galerija
          </NavLink>
          {/* <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
            <i className="fa-solid fa-paw"></i>Kontakt
          </NavLink> */}
          <a href="#footer">
            <i className="fa-solid fa-paw"></i>Kontakt
          </a>
        </div>
        <div className={classes.background}></div>
      </div>
    </Fragment>
  )
}

export default Header
