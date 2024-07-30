import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import Header from '../Header/Header';

import classes from './ErrorPage.module.css';
import Footer from '../Footer/Footer';

const ErrorPage = () => {
  return (
    <Fragment>
      <Header></Header>
      <div className={classes.wrapper}>
        <div class={classes['error-container']}>
          <h1> 404 </h1>
          <p>Uups! Stranica koju tražite nije dostupna.</p>
          <Link to="/">Vrati se na početak</Link>
        </div>
      </div>
    </Fragment>
  );
};

export default ErrorPage;
