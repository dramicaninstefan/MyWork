import { Fragment } from 'react';

import classes from './CallUsButton.module.css';

const CallUsButton = () => {
  return (
    <Fragment>
      <a href="tel:+381608060001" id="phone-link" className={classes.callUsBtn}>
        <div className={classes.circle}>
          <i className="fa-solid fa-phone"></i>
        </div>
      </a>
    </Fragment>
  );
};

export default CallUsButton;
