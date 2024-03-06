import { Fragment } from 'react';

import classes from './ViberUs.module.css';

const ViberUs = () => {
  return (
    <Fragment>
      <a href="viber://chat/?number=%2B381638489439" className={classes.viberUsBtn}>
        <div className={classes.circle}>
          <i className="fa-brands fa-viber"></i>
        </div>
      </a>
    </Fragment>
  );
};

export default ViberUs;
