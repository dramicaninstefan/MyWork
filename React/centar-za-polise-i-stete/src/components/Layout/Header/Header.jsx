import React, { Fragment, useState, useEffect } from 'react';
import { Link, NavLink, useLocation } from 'react-router-dom';

import './Header.css';

import logo from '../../../assets/img/logo/logo.png';

const Header = () => {
  const location = useLocation(); // location.pathName
  const [isScrolled, setIsScrolled] = useState(false); // isScrolled
  const [scrollPosition, setScrollPosition] = useState(0); // scrollPosition

  // Change header bg color on scroll
  const handleScroll = () => {
    const position = window.scrollY || window.pageYOffSet;
    setScrollPosition(position);
  };

  useEffect(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  useEffect(() => {
    scrollPosition > 100 ? setIsScrolled(true) : setIsScrolled(false);
  }, [scrollPosition]);

  // Change header bg color on different endpoints
  const [pahtname, setPathname] = useState(false);
  useEffect(() => {
    if (
      // location.pathname === '/kasko-osiguranje-vozila' ||
      location.pathname === '/autoodgovornost' ||
      location.pathname === '/pomoc-na-putu' ||
      location.pathname === '/registracija-vozila' ||
      location.pathname === '/naplata-naknada-stete' ||
      location.pathname === '/putno-osiguranje' ||
      location.pathname === '/zivotno-osiguranje' ||
      location.pathname === '/dobrovoljno-zdravstveno-osiguranje' ||
      location.pathname === '/osiguranje-od-nezgode' ||
      location.pathname === '/osiguranje-domacinstva' ||
      location.pathname === '/politika-privatnosti'
    ) {
      setPathname(true);
      document.querySelector('collapse').forEach((faqItem) => {
        console.log(faqItem);
      });
    } else {
      setPathname(false);
    }
  }, [location.pathname]);

  return (
    <Fragment>
      <header className={pahtname ? `header pathname d-flex flex-column align-items-center fixed-top` : `header ${isScrolled ? `isScrolled` : ``} d-flex flex-column align-items-center fixed-top`}>
        <div className="topbar">
          <div className="container d-flex justify-content-center justify-content-md-between">
            <div className="contact-info">
              <i className="bi bi-envelope d-flex align-items-center">
                <a href="mailto:office@centarzapoliseistete.rs" target="_blank" rel="noreferrer">
                  office@centarzapoliseistete.rs
                </a>
              </i>
              <i className="bi bi-phone d-flex align-items-center ms-4">
                <a href="tel:+381608060001">
                  <span>+381 608060001</span>
                </a>
              </i>
            </div>
            <div className="social-links d-none d-md-flex align-items-center">
              <a href="viber://chat/?number=%2B381638489439" className="viber" target="_blank" rel="noreferrer">
                <i className="fa-brands fa-viber"></i>
              </a>
              <a href="https://wa.me/+381638489439" className="whatsup" target="_blank" rel="noreferrer">
                <i className="fa-brands fa-whatsapp"></i>
              </a>
              <a href="https://www.instagram.com/sve_za_osiguranje?utm_source=ig_web_button_share_sheet" className="instagram" target="_blank" rel="noreferrer">
                <i className="fa-brands fa-instagram"></i>
              </a>
              <a href="https://www.facebook.com/profile.php?id=61556129409531&mibextid=ZbWKwL" className="facebook" target="_blank" rel="noreferrer">
                <i className="fa-brands fa-facebook"></i>
              </a>
              <a href="https://www.tiktok.com/@svezaosiguranje?is_from_webapp=1&sender_device=pc" className="tiktok" target="_blank" rel="noreferrer">
                <i className="fa-brands fa-tiktok"></i>
              </a>
            </div>
          </div>
        </div>
        <nav className="navbar navbar-expand-lg navbar-light">
          <div className="container">
            <Link className="logo" to="/">
              <img src={logo} alt="" />
            </Link>
            <button
              style={{ border: `2px solid #fff` }}
              className="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarResponsive"
              aria-controls="navbarResponsive"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i className="fa-solid fa-bars" style={{ color: `#fff` }}></i>
            </button>
            <div className="collapse navbar-collapse" id="navbarResponsive">
              <ul className="navbar-nav ms-auto">
                <li className="nav-item">
                  <NavLink className={({ isActive }) => (isActive ? `nav-link active` : `nav-link`)} to="/" end>
                    Početna
                  </NavLink>
                </li>
                <li className="nav-item">
                  <NavLink className={({ isActive }) => (isActive ? `nav-link active` : `nav-link`)} to="/kasko-osiguranje-vozila" end>
                    Kasko osiguranje
                  </NavLink>
                </li>
                <li className="nav-item">
                  <NavLink className={({ isActive }) => (isActive ? `nav-link active` : `nav-link`)} to="/naplata-naknada-stete" end>
                    Naplata štete
                  </NavLink>
                </li>
                <li className="nav-item">
                  <NavLink className={({ isActive }) => (isActive ? `nav-link active` : `nav-link`)} to="/putno-osiguranje" end>
                    Putno osiguranje
                  </NavLink>
                </li>
              </ul>
              <a className="btn-getstarted" href="#contact">
                Pošalji upit
              </a>
            </div>
          </div>
        </nav>
      </header>
    </Fragment>
  );
};

export default Header;
