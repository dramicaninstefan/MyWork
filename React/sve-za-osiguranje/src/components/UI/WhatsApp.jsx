import { Fragment } from 'react';

import classes from './WhatsApp.module.css';

const WhatsApp = () => {
  return (
    <Fragment>
      <a href="https://wa.me/+381638489439" className={classes.whatsAppBtn}>
        <div className={classes.circle}>
          <i className="fa-brands fa-whatsapp"></i>
        </div>
      </a>
    </Fragment>
  );
};

export default WhatsApp;
