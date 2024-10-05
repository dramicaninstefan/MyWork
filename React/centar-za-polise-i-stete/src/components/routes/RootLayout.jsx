import React, { Fragment, useState, useEffect } from 'react';
import { Outlet, useLocation } from 'react-router-dom';

import Footer from '../Layout/Footer/Footer';
import Header from '../Layout/Header/Header';
import ToTopButton from '../UI/ToTopButton/ToTopButton';
import ContactFormButton from '../UI/ContactForm/ContactFormButton/ContactFormButton';
import CookieConsent from '../UI/CookieConsent/CookieConsent';
// import CallUsButton from '../UI/ContactForm/CallUsButton/CallUsButton';

const RootLayout = () => {
  const location = useLocation(); // location.pathName
  const [pahtname, setPathname] = useState(false); //pathname

  useEffect(() => {
    // Change header bg color on different endpoints
    if (location.pathname === '/kasko-forma') {
      setPathname(false);
    } else {
      setPathname(true);
    }
  }, [location.pathname]);
  return (
    <Fragment>
      {pahtname ? <Header /> : undefined}
      {/* <Header /> */}
      <Outlet />
      {pahtname ? <Footer /> : undefined}
      {/* <Footer /> */}
      <ToTopButton />
      {/* <CallUsButton /> */}
      <CookieConsent />
      <ContactFormButton />
    </Fragment>
  );
};

export default RootLayout;
