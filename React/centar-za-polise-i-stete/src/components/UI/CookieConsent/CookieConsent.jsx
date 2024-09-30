import React, { useEffect, useState } from 'react';
import { hasCookie, setCookie } from 'cookies-next';
import { Link } from 'react-router-dom';

import classes from './CookieConsent.module.css';

const CookieConsent = () => {
  const [showConsent, setShowConsent] = useState(true);

  useEffect(() => {
    setShowConsent(hasCookie('localConsent'));
  }, []);

  const acceptCookie = () => {
    setShowConsent(true);
    setCookie('localConsent', 'true', {});
  };

  const declineCookie = () => {
    setShowConsent(true);
    setCookie('localConsent', 'false', {});
  };

  if (showConsent) {
    return null;
  }

  return (
    <div className="position-fixed" style={{ zIndex: '10000' }}>
      <div className={`${classes.box} position-fixed bottom-0 left-0 px-4 py-5 bg-dark text-white`} data-aos="fade-up" data-aos-delay="500">
        <span className="text-white mr-xl-5">
          Koristimo kolačiće za personalizaciju sadržaja i oglasa, pružanje funkcija društvenih medija i analiziranje saobraćaja. Takođe delimo informacije o tome kako koristite sajt sa partnerima za
          društvene medije, oglašavanje i analitiku koji mogu da ih kombinuju sa drugim informacijama koje ste im dali ili koje su prikupili na osnovu koriscenja usluga.{' '}
          <Link to="/politika-privatnosti">Politika privatnosti</Link>
        </span>

        <div>
          <button
            style={{ width: `100%` }}
            className=" btn btn-light py-2 px-5 rounded mb-3"
            onClick={() => {
              acceptCookie();
            }}
          >
            Dozvoli
          </button>
          <button
            style={{ width: `100%` }}
            className="btn btn-outline-light py-2 px-5 rounded"
            onClick={() => {
              declineCookie();
            }}
          >
            Odbij
          </button>
        </div>
      </div>
    </div>
  );
};

export default CookieConsent;
