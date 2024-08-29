import React, { Fragment, useState, useEffect } from 'react';
import { Link, NavLink, useLocation } from 'react-router-dom';
import './Header.css';
import InfiniteLooper from '../../UI/InfiniteLooper/InfiniteLooper';

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
      location.pathname === '/kasko-osiguranje-vozila' ||
      location.pathname === '/autoodgovornost' ||
      location.pathname === '/pomoc-na-putu' ||
      location.pathname === '/registracija-vozila' ||
      location.pathname === '/naplata-naknada-stete' ||
      location.pathname === '/putno-osiguranje' ||
      location.pathname === '/zivotno-osiguranje' ||
      location.pathname === '/dobrovoljno-zdravstveno-osiguranje' ||
      location.pathname === '/osiguranje-od-nezgode' ||
      location.pathname === '/osiguranje-domacinstva'
    ) {
      setPathname(true);
    } else {
      setPathname(false);
    }
  }, [location.pathname]);

  return (
    <Fragment>
      <header className={pahtname ? `header pathname d-flex flex-column align-items-center fixed-top` : `header ${isScrolled ? `isScrolled` : ``} d-flex flex-column align-items-center fixed-top`}>
        {/* <InfiniteLooper /> */}
        <div class="topbar d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
              <i class="bi bi-envelope d-flex align-items-center">
                <a href="mailto:contact@example.com">office@centarzapoliseistete.rs</a>
              </i>
              <i class="bi bi-phone d-flex align-items-center ms-4">
                <span>+381 608060001</span>
              </i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
              <a href="viber://chat/?number=%2B381638489439" class="viber">
                <i class="fa-brands fa-viber"></i>
              </a>
              <a href="https://wa.me/+381638489439" class="whatsup">
                <i class="fa-brands fa-whatsapp"></i>
              </a>
              <a href="https://www.instagram.com/sve_za_osiguranje?utm_source=ig_web_button_share_sheet" class="instagram">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="https://www.facebook.com/profile.php?id=61556129409531&mibextid=ZbWKwL" class="facebook">
                <i class="fa-brands fa-facebook"></i>
              </a>
              <a href="https://www.tiktok.com/@svezaosiguranje?is_from_webapp=1&sender_device=pc" class="tiktok">
                <i class="fa-brands fa-tiktok"></i>
              </a>
            </div>
          </div>
        </div>
        <nav className="navbar navbar-expand-lg navbar-light">
          <div className="container">
            <Link className="logo" to="/" end>
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
              <i class="fa-solid fa-bars" style={{ color: `#fff` }}></i>
            </button>
            <div className="collapse navbar-collapse" id="navbarResponsive">
              <ul className="navbar-nav ms-auto">
                <li className="nav-item active">
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
                <li className="nav-item">
                  <button
                    class="btn-getstarted"
                    onClick={() => {
                      window.scrollTo(0, 3740);
                    }}
                  >
                    Pošalji upit
                  </button>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    </Fragment>
  );
};

export default Header;
