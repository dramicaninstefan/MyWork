import React, { Fragment, useState, useEffect } from 'react';
import { Link, useLocation } from 'react-router-dom';

import classes from './ThankYouPage.module.css';

const ThankYou = () => {
  useEffect(() => {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'instant',
    });
  }, []);

  const location = useLocation(); // location.pathName
  const [pagePath, setPagePath] = useState(false); //pathname

  useEffect(() => {
    if (location.pathname === '/hvala-vam') {
      setPagePath(true);
    } else {
      setPagePath(false);
    }

    if (pagePath) {
      const script = document.createElement('script');
      script.id = 'idScript';
      script.innerHTML = `gtag('event', 'conversion', {'send_to': 'AW-11101931880/tV6vCODjptcZEOiS6K0p'});`;
      document.body.appendChild(script);

      return () => {
        document.getElementById('idScript')?.remove();
      };
    } else {
      document.getElementById('demand-base')?.remove();
    }
  }, [location.pathname, pagePath]);

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
