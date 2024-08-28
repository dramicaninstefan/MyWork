import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './ErrorPage.module.css';

const ErrorPage = () => {
  return (
    <Fragment>
      <div className={classes.wrapper}>
        <div className={classes['error-container']}>
          <h1> 404 </h1>
          <p>Uups! Stranica koju tražite nije dostupna.</p>
          <Link to="/">Vrati se na početak</Link>
        </div>
      </div>
    </Fragment>
  );
};

export default ErrorPage;
