import React, { Fragment, useRef, useState } from 'react'
import { NavLink } from 'react-router-dom'

import classes from './Header.module.css'

import logo from '../../assets/logo.png'

const Header = () => {
  const headerRef = useRef()
  const [isClicked, setIsClicked] = useState(false)

  function handleClick() {
    setIsClicked((current) => !current)
  }

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
        <div className={classes['hamburger-container']}>
          <label className={classes.hamburger} onChange={handleClick}>
            <input type="checkbox" checked={isClicked} onChange={(current) => !current} />
            <svg viewBox="0 0 32 32">
              <path
                className={`${classes.line} ${classes['line-top-bottom']}`}
                d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"
              ></path>
              <path className={classes.line} d="M7 16 27 16"></path>
            </svg>
          </label>
        </div>
      </div>

      <div className={classes['side-bar-container']} style={{ transform: isClicked ? 'translateX(0vw)' : 'translateX(80vw)' }}>
        <div className={classes['side-bar-container-logo']}>
          <img src={logo} alt="logo" />
        </div>
        <div className={classes['side-bar-container-links']}>
          <NavLink
            className={({ isActive }) => (isActive ? classes.active : undefined)}
            onClick={() => {
              setIsClicked(false)
            }}
            to="/"
            end
          >
            <i className="fa-solid fa-paw"></i>Početna
          </NavLink>
          <NavLink
            className={({ isActive }) => (isActive ? classes.active : undefined)}
            onClick={() => {
              setIsClicked(false)
            }}
            to="/o_nama"
            end
          >
            <i className="fa-solid fa-paw"></i>O Nama
          </NavLink>
          <NavLink
            className={({ isActive }) => (isActive ? classes.active : undefined)}
            onClick={() => {
              setIsClicked(false)
            }}
            to="/galerija"
            end
          >
            <i className="fa-solid fa-paw"></i>Galerija
          </NavLink>
          <NavLink
            className={({ isActive }) => (isActive ? classes.active : undefined)}
            onClick={() => {
              setIsClicked(false)
            }}
            to="/kontakt"
            end
          >
            <i className="fa-solid fa-paw"></i>Kontakt
          </NavLink>
        </div>
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
    </Fragment>
  )
}

export default Header
