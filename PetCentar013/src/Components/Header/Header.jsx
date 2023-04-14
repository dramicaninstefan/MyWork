import React, { Fragment, useEffect, useRef, useState } from 'react'
import { NavLink } from 'react-router-dom'

import classes from './Header.module.css'

import logo from '../../assets/logo.png'
import headerBackground from '../../assets/bg4.png'

const Header = () => {
  const headerRef = useRef()

  // const [scroll, setScroll] = useState(false)

  // useEffect(() => {
  //   window.addEventListener('scroll', fixNav)

  //   return () => {
  //     window.removeEventListener('scroll', fixNav)
  //   }
  // })

  // function fixNav() {
  //   if (window.scrollY > headerRef.current?.offsetHeight + 150) {
  //     setScroll(true)
  //   } else {
  //     setScroll(false)
  //   }
  // }

  return (
    <Fragment>
      <div ref={headerRef} className={classes.container}>
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
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
            <i className="fa-solid fa-paw"></i>Kontakt
          </NavLink>
        </div>
        <div className={classes.background}></div>
      </div>
    </Fragment>
  )
}

export default Header
