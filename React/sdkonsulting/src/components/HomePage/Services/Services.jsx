import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './Services.module.css';

const Services = () => {
  return (
    <Fragment>
      <div className="container-xxl py-5">
        <div className="container">
          <div className="text-center mx-auto" style={{ maxWidth: `800px` }} data-aos="fade-up">
            <h2 style={{ fontWeight: `bold` }} className=" display-6 mb-5">
              Pružamo profesionalnu uslugu vezanu za osiguranje!
            </h2>
          </div>
          <div className="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-car-front" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Kasko osiguranje
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Kasko osiguranje štiti vaše vozilo od:
                  <br />
                  UDARA - neko ili nešto da udari u Vaš auto
                  <br />
                  SUDARA – dase sudarite Vašom krivicom, a niste u saobraćajnom prekršaju
                  <br />
                  KRAĐA – da Vam ukradu auto
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/kasko-osiguranje-vozila">
                  Detaljnije
                </Link>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="fa-solid fa-money-check-dollar" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className=" mb-0">
                    Naplata štete
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Naplata štete uključuje prijavu štete, detaljnu procenu i isplatu troškova za nezgodu koju ste imali (materijalnu i nematerijanu štetu).
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/naplata-naknada-stete">
                  Detaljnije
                </Link>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="fa-solid fa-suitcase-rolling" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Putno osiguranje
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Putno osiguranje pokriva troškove medicinske pomoći, otkazivanja putovanja, gubitka prtljaga i druge rizike tokom putovanja.
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/putno-osiguranje">
                  Detaljnije
                </Link>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-truck-flatbed" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Pomoć na putu
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Pomoć na putu uključuje vuču vozila, popravke na licu mesta i organizaciju alternativnog prevoza ili smeštaja tokom putovanja.
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/pomoc-na-putu">
                  Detaljnije
                </Link>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-clipboard2-pulse" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Životno osiguranje
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Životno osiguranje obezbeđuje finansijsku pomoć porodici u slučaju smrti, pokrivajući troškove, dugove i pružajući dugoročnu sigurnost.
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/zivotno-osiguranje">
                  Detaljnije
                </Link>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
              <div className={`${classes['service-item']} rounded h-100 p-5`}>
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className={`${classes['service-icon']} flex-shrink-0 rounded-end`} style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-house-check" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Domaćinstvo
                  </h4>
                </div>
                <p className="mb-4" style={{ minHeight: `120px` }}>
                  Osiguranje domaćinstva štiti vaš dom od požara, poplava, krađe i drugih rizika, pokrivajući troškove popravke i odgovornosti.
                </p>
                <Link className={`${classes.btn} btn px-3`} to="/osiguranje-domacinstva">
                  Detaljnije
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Services;
