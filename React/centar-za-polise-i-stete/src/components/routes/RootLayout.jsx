import React, { Fragment } from 'react';
import { Outlet } from 'react-router-dom';

import Footer from '../Layout/Footer/Footer';
import Header from '../Layout/Header/Header';
import ToTopButton from '../UI/ToTopButton/ToTopButton';
import ContactFormButton from '../UI/ContactForm/ContactFormButton/ContactFormButton';
import CallUsButton from '../UI/ContactForm/CallUsButton/CallUsButton';

const RootLayout = () => {
  return (
    <Fragment>
      <Header />
      <Outlet />
      <Footer />
      <ToTopButton />
      <CallUsButton />
      <ContactFormButton />
    </Fragment>
  );
};

export default RootLayout;
