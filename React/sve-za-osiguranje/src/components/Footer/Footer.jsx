import { Fragment } from 'react';

import classes from './Footer.module.css';

const Footer = () => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.social}>
          <a href="viber://chat/?number=%2B381608060001" target="_blank" rel="noreferrer">
            <div className={classes.viber}>
              <i className="fa-brands fa-viber"></i>
            </div>
          </a>
          <a href="https://wa.me/+381608060001" target="_blank" rel="noreferrer">
            <div className={classes.whatsapp}>
              <i className="fa-brands fa-whatsapp"></i>
            </div>
          </a>
          <a href="https://www.instagram.com/" target="_blank" rel="noreferrer">
            <div className={classes.instagram}>
              <i className="fa-brands fa-instagram"></i>
            </div>
          </a>
          <a href="https://www.facebook.com/" target="_blank" rel="noreferrer">
            <div className={classes.facebook}>
              <i className="fa-brands fa-facebook-f"></i>
            </div>
          </a>
        </div>
        <div className={classes.text}>
          <p>Naša usluga je prema Vama u potpunosti BESPLATNA i bez skrivenih troškova.</p>
        </div>
        <h3 className={classes.contact}>Kontakt info:</h3>
        <div className={classes.info}>
          <a href="mailto: svezaosiguranje@gmail.com" target="_blank" rel="noreferrer" className={classes.email}>
            <i className="fa-solid fa-envelope"></i>svezaosiguranje@gmail.com
          </a>
          <a href="tel:+381608060001" className={classes.phone}>
            <i c="fa-solid fa-phone"></i>+381 608060001
          </a>
        </div>
        <div className={classes.copyright}>&copy; Copyright {new Date().getFullYear()}</div>
      </div>
    </Fragment>
  );
};

export default Footer;
