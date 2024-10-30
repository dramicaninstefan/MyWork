import React, { Fragment } from 'react';
import { Outlet } from 'react-router-dom';

import Header from '../layout/Header/Header';
import Footer from '../layout/Footer/Footer';
import ToTopButton from '../UI/ToTopButton/ToTopButton';
import CookieConsent from '../UI/CookieConsent/CookieConsent';

const RootLayout = () => {
  return (
    <Fragment>
      <Header />
      <Outlet />
      <Footer />
      <ToTopButton />
      <CookieConsent />
    </Fragment>
  );
};

export default RootLayout;
