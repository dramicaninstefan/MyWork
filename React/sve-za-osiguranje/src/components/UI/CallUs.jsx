import { Fragment } from 'react';

import classes from './CallUs.module.css';

const CallUs = () => {
  return (
    <Fragment>
      <a href="tel:+381608060001" className={classes.callUsBtn}>
        <div className={classes.circle}>
          <i className="fa-solid fa-phone"></i>
        </div>
      </a>
    </Fragment>
  );
};

export default CallUs;
