import React, { Fragment } from 'react';
import { Outlet } from 'react-router-dom';

import Footer from '../Layout/Footer/Footer';
import Header from '../Layout/Header/Header';
import ToTopButton from '../UI/ToTopButton/ToTopButton';

const RootLayout = () => {
  return (
    <Fragment>
      <Header />
      <Outlet />
      <Footer />
      <ToTopButton />
    </Fragment>
  );
};

export default RootLayout;
