import { Fragment } from 'react';

import classes from './Footer.module.css';

const Footer = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.social}>
          <a href="viber://chat/?number=%2B381638489439" rel="noreferrer">
            <div className={classes.viber}>
              <i className="fa-brands fa-viber"></i>
            </div>
          </a>
          <a href="https://wa.me/+381638489439" rel="noreferrer">
            <div className={classes.whatsapp}>
              <i className="fa-brands fa-whatsapp"></i>
            </div>
          </a>
          <a href="https://www.instagram.com/sve_za_osiguranje?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noreferrer">
            <div className={classes.instagram}>
              <i className="fa-brands fa-instagram"></i>
            </div>
          </a>
          <a href="https://www.facebook.com/profile.php?id=61556129409531&mibextid=ZbWKwL" target="_blank" rel="noreferrer">
            <div className={classes.facebook}>
              <i className="fa-brands fa-facebook-f"></i>
            </div>
          </a>
        </div>
        <div className={classes.text}>
          <p>Naš savet je prema Vama u potpunosti BESPLATAN i bez skrivenih troškova.</p>
        </div>
        <h3 className={classes.contact}>Kontakt info:</h3>
        <div className={classes.info}>
          <a href="mailto: svezaosiguranje@gmail.com" target="_blank" rel="noreferrer" className={classes.email}>
            <i className="fa-solid fa-envelope"></i>svezaosiguranje@gmail.com
          </a>
          <a href="tel:+381608060001" className={classes.phone}>
            <i className="fa-solid fa-phone"></i>+381 608060001
          </a>
        </div>
        <div className={classes.copyright}>&copy; Copyright {new Date().getFullYear()}</div>
      </div>
    </Fragment>
  );
};

export default Footer;
