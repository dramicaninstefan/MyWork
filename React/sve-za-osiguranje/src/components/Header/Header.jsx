import React, { Fragment, useEffect, useState } from 'react';
import { Link, NavLink, useLocation } from 'react-router-dom';

import classes from './Header.module.css';

import logo from '../../assets/szo-logo-@2x.png';

const Header = (props) => {
  const location = useLocation();

  // set active color of vehicles dropdown
  const [vehiclesLocation, setVehiclesLocation] = useState(false);

  const locationVehicles = () => {
    setVehiclesLocation(true);
  };

  useEffect(() => {
    if (location.pathname === '/kasko-osiguranje-vozila' || location.pathname === '/autoodgovornost' || location.pathname === '/pomoc-na-putu' || location.pathname === '/registracija-vozila') {
      locationVehicles();
    }
  }, [location.pathname]);

  // set active color of health dropdown
  const [healthLocation, setHealthLocation] = useState(false);

  const locationHealth = () => {
    setHealthLocation(true);
  };

  useEffect(() => {
    if (location.pathname === '/zivotno-osiguranje' || location.pathname === '/dobrovoljno-zdravstveno-osiguranje' || location.pathname === '/osiguranje-od-nezgode') {
      locationHealth();
    }
  }, [location.pathname]);

  // set active color of damage dropdown
  const [damageLocation, setDamageLocation] = useState(false);

  const locationDamage = () => {
    setDamageLocation(true);
  };

  useEffect(() => {
    if (
      location.pathname === '/prijava-i-naknada-stete' ||
      location.pathname === '/naplata-naknada-stete-na-vozilu' ||
      location.pathname === '/naknada-stete-kasko-osiguranje' ||
      location.pathname === '/osiguranje-putnika-u-javnom-prevozu' ||
      location.pathname === '/naknada-stete-za-fizicki-i-dusevni-bol'
    ) {
      locationDamage();
    }
  }, [location.pathname]);

  // show vehicles dropdown
  const [vehicles, setVehicles] = useState(false);

  const showVehiclesDropdown = () => {
    setVehicles(true);
  };

  const hideVehiclesDropdown = () => {
    setVehicles(false);
  };

  // show vehicle mobile dropdown
  const [vehiclesMobile, setVehiclesMobile] = useState(false);

  const showVehiclesDropdownMobile = () => {
    setVehiclesMobile((current) => !current);
    setDamageMobile(false);
    setHealthMobile(false);
  };

  // show health dropdown
  const [health, setHealth] = useState(false);

  const showHealthDropdown = () => {
    setHealth(true);
  };

  const hideHealthDropdown = () => {
    setHealth(false);
  };

  // show health mobile dropdown
  const [healthMobile, setHealthMobile] = useState(false);

  const showHealthDropdownMobile = () => {
    setVehiclesMobile(false);
    setHealthMobile((current) => !current);
    setDamageMobile(false);
  };

  // show damage dropdown
  const [damage, setDamage] = useState(false);

  const showDamageDropdown = () => {
    setDamage(true);
  };

  const hideDamageDropdown = () => {
    setDamage(false);
  };

  // show damage mobile dropdown
  const [damageMobile, setDamageMobile] = useState(false);

  const showDamageDropdownMobile = () => {
    setVehiclesMobile(false);
    setHealthMobile(false);
    setDamageMobile((current) => !current);
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

  // open menu navbar

  const [openMobileNav, setOpenMobileNav] = useState(false);

  const handleMenuNav = () => {
    setOpenMobileNav((current) => !current);
    setVehiclesMobile(false);
    setDamageMobile(false);
    setHealthMobile(false);
    window.scrollTo(0, 0);
  };

  // close menu navbar

  const handleCloseMenuNav = () => {
    setOpenMobileNav(false);
    setVehiclesMobile(false);
    setDamageMobile(false);
    setHealthMobile(false);
  };

  return (
    <Fragment>
      {/* <header className={color ? `${classes['wrapper']} ${classes.scroll}` : classes['wrapper']}> */}
      <div className={classes['wrapper']} style={color ? { backgroundColor: `var(${props.backgroundColorScroll})` } : { backgroundColor: `var(${props.backgroundColor})` }}>
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
                {/* <a href="https://facebook.com/" target="_blank" rel="noreferrer">
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
                </a> */}
              </div>
            </div>

            <div className={classes['header-links']}>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
                Početna
              </NavLink>
              <div onMouseEnter={showVehiclesDropdown} onMouseLeave={hideVehiclesDropdown} className={classes.vehicles}>
                <p style={vehiclesLocation ? { color: 'var(--secondary-color)' } : undefined}>
                  Vozila <i style={vehicles ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                </p>
                <ul className={vehicles ? `${classes['dropdown-vehicle']} ${classes.active}` : classes['dropdown-vehicle']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kasko-osiguranje-vozila" end>
                      Kasko osiguranje vozila
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/autoodgovornost" end>
                      Autoodgovornost
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/pomoc-na-putu" end>
                      Pomoc na putu
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija-vozila" end>
                      Registracija vozila
                    </NavLink>
                  </li>
                </ul>
              </div>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-domacinstva" end>
                Domaćinstvo
              </NavLink>
              <div onMouseEnter={showHealthDropdown} onMouseLeave={hideHealthDropdown} className={classes.health}>
                <p style={healthLocation ? { color: 'var(--secondary-color)' } : undefined}>
                  Životno i zdravstveno <i style={health ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                </p>

                <ul className={health ? `${classes['dropdown-health']} ${classes.active}` : classes['dropdown-health']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/zivotno-osiguranje" end>
                      Životno osiguranje
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/dobrovoljno-zdravstveno-osiguranje" end>
                      Dobrovoljno zdravstveno <br /> osiguranje
                    </NavLink>
                  </li>

                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-od-nezgode" end>
                      Osiguranje od nezgode
                    </NavLink>
                  </li>
                </ul>
              </div>
              <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/putno-osiguranje" end>
                Putno
              </NavLink>
              <div onMouseEnter={showDamageDropdown} onMouseLeave={hideDamageDropdown} className={classes.damage}>
                <p style={damageLocation ? { color: 'var(--secondary-color)' } : undefined}>
                  Naplata štete <i style={damage ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
                </p>

                <ul className={damage ? `${classes['dropdown-damage']} ${classes.active}` : classes['dropdown-damage']}>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/prijava-i-naknada-stete" end>
                      Prijava i naknada štete
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naplata-naknada-stete-na-vozilu" end>
                      Naplata štete na vozilu
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naknada-stete-kasko-osiguranje" end>
                      Naknada stete kasko <br /> osiguranja
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-putnika-u-javnom-prevozu" end>
                      Osiguranje putnika u <br />
                      javnom prevozu
                    </NavLink>
                  </li>
                  <li>
                    <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naknada-stete-za-fizicki-i-dusevni-bol" end>
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

          <div className={classes.hamburgerMenu}>
            <input className={classes.checkbox} id="checkbox22" type="checkbox" onClick={handleMenuNav} checked={openMobileNav} onChange={(current) => !current} />
            <label className={`${classes.toggle}`} htmlFor="checkbox22">
              <div className={`${classes.bar1} ${classes.bars}`}></div>
              <div className={`${classes.bar2} ${classes.bars}`}></div>
              <div className={`${classes.bar3} ${classes.bars}`}></div>
            </label>
          </div>
        </div>
      </div>

      {/* mobile navbar */}
      <div className={openMobileNav ? `${classes['mobileMenu']} ${classes.active}` : classes['mobileMenu']}>
        <ul className={classes.links}>
          <li>
            <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/" end>
              Početna
            </NavLink>
          </li>
          <li>
            <div onClick={showVehiclesDropdownMobile}>
              <p style={vehiclesLocation ? { color: 'var(--secondary-color)' } : undefined}>
                Vozila <i style={vehiclesMobile ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
              </p>
              <ul className={vehiclesMobile ? `${classes['dropdown-vehicle']} ${classes.active}` : classes['dropdown-vehicle']}>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/kasko-osiguranje-vozila" end>
                    Kasko osiguranje vozila
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/autoodgovornost" end>
                    Autoodgovornost
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/pomoc-na-putu" end>
                    Pomoc na putu
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/registracija-vozila" end>
                    Registracija vozila
                  </NavLink>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-domacinstva" end>
              Domaćinstvo
            </NavLink>
          </li>
          <li>
            <div onClick={showHealthDropdownMobile}>
              <p style={healthLocation ? { color: 'var(--secondary-color)' } : undefined}>
                Životno i zdravstveno <i style={healthMobile ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
              </p>
              <ul className={healthMobile ? `${classes['dropdown-health']} ${classes.active}` : classes['dropdown-health']}>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/zivotno-osiguranje" end>
                    Životno osiguranje
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/dobrovoljno-zdravstveno-osiguranje" end>
                    Dobrovoljno zdravstveno <br /> osiguranje
                  </NavLink>
                </li>

                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-od-nezgode" end>
                    Osiguranje od nezgode
                  </NavLink>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/putno-osiguranje" end>
              Putno
            </NavLink>
          </li>
          <li>
            <div onClick={showDamageDropdownMobile}>
              <p style={damageLocation ? { color: 'var(--secondary-color)' } : undefined}>
                Naplata štete <i style={damageMobile ? { transform: 'rotate(0deg)' } : { transform: 'rotate(-90deg)' }} className="fa-solid fa-angle-down"></i>
              </p>
              <ul className={damageMobile ? `${classes['dropdown-damage']} ${classes.active}` : classes['dropdown-damage']}>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/prijava-i-naknada-stete" end>
                    Prijava i naknada štete
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naplata-naknada-stete-na-vozilu" end>
                    Naplata štete na vozilu
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naknada-stete-kasko-osiguranje" end>
                    Naknada stete kasko <br /> osiguranja
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/osiguranje-putnika-u-javnom-prevozu" end>
                    Osiguranje putnika u <br />
                    javnom prevozu
                  </NavLink>
                </li>
                <li>
                  <NavLink className={({ isActive }) => (isActive ? classes.active : undefined)} to="/naknada-stete-za-fizicki-i-dusevni-bol" end>
                    Naknada štete za fizičku <br /> i duševnu bol
                  </NavLink>
                </li>
              </ul>
            </div>
          </li>
          <li onClick={handleCloseMenuNav}>
            <a href="#contact-form">Kontakt</a>
          </li>
        </ul>
      </div>
    </Fragment>
  );
};

export default Header;
