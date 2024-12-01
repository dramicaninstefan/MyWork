import React, { Fragment } from 'react';

import logo from '../../../assets/img/logo/logo.png';

const Footer = () => {
  return (
    <Fragment>
      <footer id="footer" class="footer">
        <div class="container footer-top">
          <div class="row gy-4">
            <div class="col-lg-6 col-md-6 footer-about">
              <a href="index.html" class="d-flex align-items-center">
                <img src={logo} alt="" style={{ maxHeight: `40px` }} />
              </a>
              <div class="footer-contact pt-3">
                {/* <p>A108 Adam Street</p> */}
                {/* <p>New York, NY 535022</p> */}
                <p class="mt-3">
                  <strong>Phone:</strong> <span>+1 5589 55488 55</span>
                </p>
                <p>
                  <strong>Email:</strong> <span>info@example.com</span>
                </p>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">
              <h4>Zapratite nas</h4>
              <p>Naš savet je prema Vama u potpunosti BESPLATAN i bez skrivenih troškova.</p>
              <div class="social-links d-flex">
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
        </div>

        <div class="container copyright text-center mt-4">
          <p>
            © <span>Copyright</span> <strong class="px-1 sitename">NAPLATA ŠTETE</strong> <span>All Rights Reserved</span>
          </p>
        </div>
      </footer>
    </Fragment>
  );
};

export default Footer;
