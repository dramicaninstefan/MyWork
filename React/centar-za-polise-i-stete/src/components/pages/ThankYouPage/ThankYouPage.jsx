import React, { Fragment, useEffect } from 'react';

import classes from './ThankYouPage.module.css';
import { Link } from 'react-router-dom';

const ThankYou = () => {
  useEffect(() => {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'instant',
    });
  }, []);

  return (
    <Fragment>
      <div className={classes.wrapper}>
        <div className=" text-center">
          <h1 className="display-3">Hvala Vam!</h1>
          <p className="lead">Uskoro će vas kontaktirati jedan od naših agenata.</p>
          <hr />
          <Link to="/" className="btn btn-primary btn-sm py-2 px-4" style={{ fontSize: '18px' }}>
            Vrati se na početnu stranicu
          </Link>
        </div>
      </div>
    </Fragment>
  );
};

export default ThankYou;
