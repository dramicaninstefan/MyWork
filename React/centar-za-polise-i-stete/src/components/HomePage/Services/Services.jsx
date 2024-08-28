import React, { Fragment } from 'react';

import './Services.css';

const Services = () => {
  return (
    <Fragment>
      <div className="container-xxl py-5">
        <div className="container">
          <div className="section-title text-center mx-auto" style={{ maxWidth: `800px` }}>
            <h2 style={{ fontWeight: `bold` }} className=" display-6 mb-5">
              Pružamo profesionalne usluge osiguranja.
            </h2>
          </div>
          <div className="row g-4 justify-content-center">
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-car-front" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Kasko osiguranje
                  </h4>
                </div>
                <p className="mb-4">Kasko osiguranje štiti vaše vozilo od štete uzrokovane nezgodama, krađom, vandalizmom i drugim rizicima, nadopunjujući osnovno osiguranje.</p>
                <a className="btn btn-light px-3" href="/kasko-osiguranje-vozila">
                  Detaljnije
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="fa-solid fa-money-check-dollar" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className=" mb-0">
                    Naplata štete
                  </h4>
                </div>
                <p className="mb-4">Naplata štete uključuje prijavu štete, detaljnu procenu i isplatu troškova popravke ili zamene oštećenog vozila, u skladu sa polisom.</p>
                <a className="btn px-3" href="/naplata-naknada-stete">
                  Detaljnije
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="fa-solid fa-suitcase-rolling" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Putno osiguranje
                  </h4>
                </div>
                <p className="mb-4">Putno osiguranje pokriva troškove medicinske pomoći, otkazivanja putovanja, gubitka prtljaga i druge rizike tokom putovanja.</p>
                <a className="btn px-3" href="/putno-osiguranje">
                  Detaljnije
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-truck-flatbed" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Pomoć na putu
                  </h4>
                </div>
                <p className="mb-4">Pomoć na putu uključuje vuču vozila, popravke na licu mesta i organizaciju alternativnog prevoza ili smeštaja tokom putovanja.</p>
                <a className="btn px-3" href="/pomoc-na-putu">
                  Detaljnije
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-clipboard2-pulse" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Životno osiguranje
                  </h4>
                </div>
                <p className="mb-4">Životno osiguranje obezbeđuje finansijsku pomoć porodici u slučaju smrti, pokrivajući troškove, dugove i pružajući dugoročnu sigurnost.</p>
                <a className="btn px-3" href="/zivotno-osiguranje">
                  Detaljnije
                </a>
              </div>
            </div>
            <div className="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
              <div className="service-item rounded h-100 p-5">
                <div className="d-flex align-items-center ms-n5 mb-4">
                  <div className="service-icon flex-shrink-0 rounded-end" style={{ marginLeft: `-50px`, marginRight: '20px', backgroundColor: '#56b8e6' }}>
                    <i className="bi bi-house-check" style={{ color: `#fff`, fontSize: `50px` }}></i>
                  </div>
                  <h4 style={{ fontWeight: `bold` }} className="mb-0">
                    Domaćinstvo
                  </h4>
                </div>
                <p className="mb-4">Osiguranje domaćinstva štiti vaš dom od požara, poplava, krađe i drugih rizika, pokrivajući troškove popravke i odgovornosti.</p>
                <a className="btn px-3 " href="/osiguranje-domacinstva">
                  Detaljnije
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Services;
