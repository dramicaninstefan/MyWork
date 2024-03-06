import { Fragment } from 'react';

import classes from './WhatsApp.module.css';

const WhatsApp = () => {
  return (
    <Fragment>
      <a href="viber://chat/?number=%2B381638489439" className={classes.whatsAppBtn}>
        <div className={classes.circle}>
          <i className="fa-brands fa-whatsapp"></i>
        </div>
      </a>
    </Fragment>
  );
};

export default WhatsApp;
