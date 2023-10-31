import { Fragment } from 'react'
import { NavLink } from 'react-router-dom'

import classes from './Header.module.css'

import paws from '../../assets/paws.png'
import paws2 from '../../assets/paws2.png'

const Header = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.logo}>
          <img src={paws} alt="logo" />
        </div>
        <nav className={classes.navbar}>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
            <i className="fa-solid fa-paw"></i> Početna
          </NavLink>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/o_nama" end>
            <i className="fa-solid fa-paw"></i> O Nama
          </NavLink>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/galerija" end>
            <i className="fa-solid fa-paw"></i> Galerija
          </NavLink>
          <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
            <i className="fa-solid fa-paw"></i> Kontakt
          </NavLink>
        </nav>
      </div>
    </Fragment>
  )
}

export default Header
