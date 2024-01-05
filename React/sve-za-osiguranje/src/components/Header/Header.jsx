import React, { Fragment, useState } from 'react';
import { Link, NavLink } from 'react-router-dom';

import classes from './Header.module.css';

import logo from '../../assets/szo-logo-@2x.png';
// import instagram from '../../assets/instagram.png';
// import facebook from '../../assets/facebook.png';
// import whatsapp from '../../assets/whatsapp.png';
// import viber from '../../assets/viber.png';

const Header = () => {
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
                  {/* <img src={facebook} alt="facebook-link" /> */}
                  <i className="fa-brands fa-square-facebook"></i>
                </a>
                <a href="https://instagram.com/" target="_blank" rel="noreferrer">
                  {/* <img src={instagram} alt="instagram-link" /> */}
                  <i className="fa-brands fa-instagram"></i>
                </a>
                <a href="viber://chat/?number=%2B381608060001" target="_blank" rel="noreferrer">
                  {/* <img src={viber} alt="viber-link" /> */}
                  <i className="fa-brands fa-viber"></i>
                </a>
                <a href="https://wa.me/+381608060001" target="_blank" rel="noreferrer">
                  {/* <img src={whatsapp} alt="whatsapp-link" /> */}
                  <i className="fa-brands fa-whatsapp"></i>
                </a>
              </div>
            </div>
            <div className={classes['header-links']}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
                Početna
              </NavLink>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Vozila
              </NavLink>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Domaćinstvo
              </NavLink>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Životno i zdravstveno
              </NavLink>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Putno
              </NavLink>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kontakt" end>
                Naplata štete
              </NavLink>
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
