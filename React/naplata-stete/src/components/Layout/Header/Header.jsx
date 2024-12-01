import { Fragment } from 'react';

import logo from '../../../assets/img/logo/logo.png';

const Header = () => {
  return (
    <Fragment>
      <header id="header" className="header sticky-top">
        <div className="topbar d-flex align-items-center">
          <div className="container d-flex justify-content-center justify-content-md-between">
            <div className="contact-info d-flex align-items-center">
              <i className="bi bi-envelope d-flex align-items-center">
                <a href="mailto:contact@example.com">contact@example.com</a>
              </i>
              <i className="bi bi-phone d-flex align-items-center ms-4">
                <span>+1 5589 55488 55</span>
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

        <div className="branding d-flex align-items-cente">
          <div className="container position-relative d-flex align-items-center justify-content-between">
            <a href="/" className="logo d-flex align-items-center">
              <img src={logo} alt="" />
              {/* <h1 className="sitename">Naplata Štete</h1> */}
            </a>

            <nav id="navmenu" className="navmenu">
              <ul>
                <li>
                  <button
                    onClick={(e) => {
                      e.preventDefault();
                      const y = document.getElementById('contact').offsetTop;
                      window.scrollTo({ top: y - 180, behavior: 'smooth' });
                    }}
                    className="btn-get-started"
                  >
                    Pošalji upit
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </header>
    </Fragment>
  );
};

export default Header;
