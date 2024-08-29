import React, { Fragment } from 'react';

import './Footer.css';

import logo from '../../../assets/img/logo/logo.png';

const Footer = () => {
  return (
    <Fragment>
      <div className="container-fluid footer mt-5 pt-4 wow fadeIn" data-wow-delay="0.1s">
        <div className="container py-5">
          <div className="row g-5">
            <div className="col-lg-4 col-md-6">
              <img src={logo} alt="" />
              <p>Naš savet je prema Vama u potpunosti BESPLATAN i bez skrivenih troškova.</p>
              <div className="d-flex pt-2">
                <a className="btn btn-square me-1" href="/">
                  <i className="fab fa-viber"></i>
                </a>
                <a className="btn btn-square me-1" href="/">
                  <i className="fab fa-whatsapp"></i>
                </a>
                <a className="btn btn-square me-1" href="/">
                  <i className="fab fa-instagram"></i>
                </a>
                <a className="btn btn-square me-1" href="/">
                  <i className="fab fa-facebook-f"></i>
                </a>
                <a className="btn btn-square me-0" href="/">
                  <i className="fab fa-tiktok"></i>
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6">
              <h5 className="text-light mb-4">Kontaktirajte nas</h5>
              <p>
                <i className="fa fa-map-marker-alt me-3"></i>Žarka Zrenjanina 36, Starčevo, Srbija
              </p>
              <p>
                <i className="fa fa-phone-alt me-3"></i>+381 608060001
              </p>
              <p>
                <i className="fa fa-envelope me-3"></i>office@centarzapoliseistete.rs
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
                &copy; <a href="#">Centar za polise i stete</a>, All Right Reserved.
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Footer;
