import React, { Fragment, useEffect } from 'react';
import { Link } from 'react-router-dom';

import classes from './ThankYouPage.module.css';

import logo from '../../../assets/img/logo/logo-blue-trans.png';

import InfiniteLooper from '../../UI/InfiniteLooper/InfiniteLooper';

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
      <div className={`${classes.wrapper}`}>
        <div className=" text-center">
          <img src={logo} alt="logo" style={{ width: '600px' }} />
          <h1 className="display-3">Hvala Vam!</h1>
          <p className="lead">
            Uskoro će vas kontaktirati jedan od naših agenata.
            <br />
            <br />
          </p>
          <hr />
          <Link to="/" className="btn btn-primary btn-sm py-2 px-4" style={{ fontSize: '18px' }}>
            Pogledajte i ostale ponude sa našeg sajta.
          </Link>
        </div>
      </div>
      <InfiniteLooper />
    </Fragment>
  );
};

export default ThankYou;
