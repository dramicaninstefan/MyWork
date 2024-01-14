import React, { Fragment, useState } from 'react';
import { Link, NavLink } from 'react-router-dom';

import classes from './Header.module.css';

import logo from '../../assets/szo-logo-@2x.png';

const Header = () => {
  // show vehicles dropdown
  const [vehicles, setVehicles] = useState(false);

  const showVehiclesDropdown = () => {
    setVehicles(true);
  };

  const hideVehiclesDropdown = () => {
    setVehicles(false);
  };

  // show health dropdown
  const [health, setHealth] = useState(false);

  const showHealthDropdown = () => {
    setHealth(true);
  };

  const hideHealthDropdown = () => {
    setHealth(false);
  };

  // show damage dropdown
  const [damage, setDamage] = useState(false);

  const showDamageDropdown = () => {
    setDamage(true);
  };

  const hideDamageDropdown = () => {
    setDamage(false);
  };

  // change color of header on scroll
  const [color, setColor] = useState(false);
  const changeColor = () => {
    if (window.scrollY >= 550) {
      setColor(true);
    } else {
      setColor(false);
    }
  };

  window.addEventListener('scroll', changeColor);

  return (
    <Fragment>
      <header className={color ? `${classes['wrapper']} ${classes.scroll}` : classes['wrapper']}>
        <div className={classes.container}>
          <div className={classes['header-logo']}>
            <Link to="/">
              <img src={logo} alt="SveZaOsiguranjeLogo" />
            </Link>
          </div>
          <div className={classes['header-content']}>
            <div className={classes['header-info']}>
              <div className={classes['header-info-news']}></div>

              <div className={classes['header-info-number']}>
                <a href="tel:+381608060001">+381 608060001</a>
              </div>
              <div className={classes['header-info-social']}>
                <a href="https://facebook.com/" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://instagram.com/" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-instagram"></i>
                </a>
                <a href="viber://chat/?number=%2B381608060001" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-viber"></i>
                </a>
                <a href="https://wa.me/+381608060001" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-whatsapp"></i>
                </a>
              </div>
            </div>

            <div className={classes['header-links']}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
                Početna
              </NavLink>
              <div onMouseEnter={showVehiclesDropdown} onMouseLeave={hideVehiclesDropdown} className={classes.vehicles}>
                Vozila <i style={vehicles ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                <ul className={vehicles ? `${classes['dropdown-vehicle']} ${classes.active}` : classes['dropdown-vehicle']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kasko" end>
                      Kasko osiguranje vozila
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/autoodgovornost" end>
                      Autoodgovornost
                    </NavLink>
                  </li>

                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija" end>
                      Registracija vozila
                    </NavLink>
                  </li>
                </ul>
              </div>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Domaćinstvo
              </NavLink>
              <div onMouseEnter={showHealthDropdown} onMouseLeave={hideHealthDropdown} className={classes.health}>
                Životno i zdravstveno <i style={health ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                <ul className={health ? `${classes['dropdown-health']} ${classes.active}` : classes['dropdown-health']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kasko" end>
                      Životno osiguranje
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/autoodgovornost" end>
                      Dobrovoljno zdravstveno <br /> osiguranje
                    </NavLink>
                  </li>

                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija" end>
                      Osiguranje od nezgode
                    </NavLink>
                  </li>
                </ul>
              </div>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Putno
              </NavLink>
              <div onMouseEnter={showDamageDropdown} onMouseLeave={hideDamageDropdown} className={classes.damage}>
                Naplata štete <i style={damage ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                <ul className={damage ? `${classes['dropdown-damage']} ${classes.active}` : classes['dropdown-damage']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kasko" end>
                      Prijava i naknada štete
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/autoodgovornost" end>
                      Naplata štete na vozilu
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija" end>
                      Naknada stete kasko <br /> osiguranja
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija" end>
                      Osiguranje putnika u <br />
                      javnom prevozu
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija" end>
                      Naknada štete za fizičku <br /> i duševnu bol
                    </NavLink>
                  </li>
                </ul>
              </div>
              <a className={classes.contact} href="#contact-form">
                Kontakt
              </a>
            </div>
          </div>
        </div>
      </header>
    </Fragment>
  );
};

export default Header;
