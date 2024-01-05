import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import Header from '../Header/Header';

import classes from './ErrorPage.module.css';
import Loader from '../UI/Loader';

const ErrorPage = () => {
  return (
    <Fragment>
      <Header></Header>
      <div className={classes.wrapper}>
        <h1 className={classes.title}>Stranica nije pronadjena (404)</h1>
        <Loader />
        <Link to="/">Vrati se na početak</Link>
      </div>
    </Fragment>
  );
};

export default ErrorPage;
