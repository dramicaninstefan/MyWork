import React, { Fragment } from 'react';

import './Footer.css';

import logo from '../../../assets/img/logo/logo.png';
import { Link } from 'react-router-dom';

const Footer = () => {
  return (
    <Fragment>
      <div className="container-fluid footer mt-5 pt-4 wow fadeIn" data-wow-delay="0.1s">
        <div className="container py-5">
          <div className="row g-5">
            <div className="col-lg-4 col-md-6">
              <img src={logo} alt="" style={{ maxWidth: `200px` }} />
              <p>Naš savet je prema Vama u potpunosti BESPLATAN za polise i bez skrivenih troškova.</p>
              <div className="social-links d-flex pt-2">
                <a href="viber://chat/?number=%2B381638489439" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-viber"></i>
                </a>
                <a href="https://wa.me/+381638489439" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-whatsapp"></i>
                </a>
                <a href="https://www.instagram.com/sve_za_osiguranje?utm_source=ig_web_button_share_sheet" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/profile.php?id=61556129409531&mibextid=ZbWKwL" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-facebook"></i>
                </a>
                <a href="https://www.tiktok.com/@svezaosiguranje?is_from_webapp=1&sender_device=pc" target="_blank" rel="noreferrer">
                  <i className="fa-brands fa-tiktok"></i>
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6">
              <h5 className="text-light mb-4">Kontaktirajte nas</h5>
              {/* <p>
                <a href="https://maps.app.goo.gl/psgXqSZYUTjFQPPr6" className="btn btn-link" target="_blank" rel="noreferrer">
                  <i className="fa fa-map-marker-alt me-3"></i>Žarka Zrenjanina 36, Starčevo, Srbija
                </a>
              </p> */}
              <p>
                <a href="tel:+381608060001" className="btn btn-link">
                  <i className="fa fa-phone-alt me-3"></i>+381 608060001
                </a>
              </p>
              <p>
                <a href="mailto: svezaosiguranje@gmail.com" className="btn btn-link" target="_blank" rel="noreferrer">
                  <i className="fa fa-envelope me-3"></i>office@centarzapoliseistete.rs
                </a>
              </p>
            </div>
            <div className="col-lg-4 col-md-6">
              <h5 className="text-light mb-4">Linkovi</h5>
              <a className="btn btn-link" href="/">
                Početna
              </a>
              <a className="btn btn-link" href="/kasko-osiguranje-vozila">
                Kasko osiguranje
              </a>
              <a className="btn btn-link" href="/naplata-naknada-stete">
                Naplata štete
              </a>
              <a className="btn btn-link" href="/putno-osiguranje">
                Putno osiguranje
              </a>
              <a className="btn btn-link" href="/politika-privatnosti">
                Politika privatnosti
              </a>
            </div>
          </div>
        </div>
        <div className="container-fluid copyright">
          <div className="container">
            <div className="row">
              <div className="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <Link>Centar za polise i stete</Link>, All Right Reserved.
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Footer;
