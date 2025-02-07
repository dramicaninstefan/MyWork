import { Fragment, useState, useEffect } from 'react';

import './Header.css';

// import logo from '../../../assets/img/hero-bg-2.jpg';

const Header = () => {
  const [isScrolled, setIsScrolled] = useState(false); // isScrolled
  const [scrollPosition, setScrollPosition] = useState(0); // scrollPosition

  // // Close navbar on scroll
  // const closeNavbar = () => {
  //   const navbarShow = document.getElementById('navbarResponsive');
  //   navbarShow.classList.remove('show');
  // };

  // useEffect(() => {
  //   window.addEventListener('scroll', closeNavbar, { passive: true });

  //   return () => {
  //     window.removeEventListener('scroll', closeNavbar);
  //   };
  // }, []);

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
    scrollPosition > 80 ? setIsScrolled(true) : setIsScrolled(false);
  }, [scrollPosition]);

  return (
    <Fragment>
      <header id="header" className={`header ${isScrolled ? `isScrolled` : ``} d-flex align-items-center fixed-top`}>
        <div className="container position-relative d-flex align-items-center justify-content-between">
          <a href="index.html" className="logo d-flex align-items-center">
            {/* <img src="assets/img/logo.png" alt="">  */}
            <h1 className="sitename">SDKonsulting</h1>
          </a>

          <nav id="navmenu" className="navmenu">
            <ul>
              <li>
                <a href="#hero" className="active">
                  Početna
                </a>
              </li>
              <li>
                <a href="#about">Zašto mi?</a>
              </li>
              <li>
                <a href="#details">Detalji o vizi D</a>
              </li>
              <li>
                <a href="#pricing">Naše usluge</a>
              </li>
              <li>
                <a href="#contact" className="btn-get-started">
                  Pošalji upit
                </a>
              </li>
            </ul>
            <i className="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>
        </div>
      </header>

      {/* <header className={`header  d-flex flex-column align-items-center fixed-top`}>
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
                  <span>+381 60 80 60 001</span>
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
              id="navbar-toggler"
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
                  <NavLink className={({ isActive }) => (isActive ? `nav-link active` : `nav-link`)} to="/nas-tim" end>
                    Naš tim
                  </NavLink>
                </li>
              </ul>
              <Link
                onClick={(e) => {
                  e.preventDefault();
                  const y = document.getElementById('contact').offsetTop;
                  window.scrollTo({ top: y - 180, behavior: 'smooth' });
                }}
                className="btn-getstarted"
              >
                Pošalji upit
              </Link>
            </div>
          </div>
        </nav>
      </header> */}
    </Fragment>
  );
};

export default Header;
