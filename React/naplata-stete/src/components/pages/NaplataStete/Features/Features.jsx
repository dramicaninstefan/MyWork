import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

const Features = () => {
  return (
    <Fragment>
      <section id="featured-services" className="featured-services section">
        <div className="container">
          <div className="row gy-4">
            <div className="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div className="service-item position-relative">
                <div className="icon">
                  <i class="fa-regular fa-credit-card"></i>
                </div>
                <h4>
                  <Link className="stretched-link">Isplata naknade štete na Vaš tekući račun</Link>
                </h4>
                <p>Isplata celokupne naknade ide na Vaš tekući račun</p>
              </div>
            </div>

            <div className="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
              <div className="service-item position-relative">
                <div className="icon">
                  <i class="fa-brands fa-creative-commons-nc-eu"></i>
                </div>
                <h4>
                  <Link className="stretched-link">Bez troškova sa Vaše strane</Link>
                </h4>
                <p>Celokupni postupak vodimo bez troškova sa Vaše strane!</p>
              </div>
            </div>

            <div className="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
              <div className="service-item position-relative">
                <div className="icon">
                  <i class="fa-solid fa-car-on"></i>
                </div>
                <h4>
                  <Link className="stretched-link">Naplate štete sa originalnim delovima</Link>
                </h4>
                <p>…kad god je moguće, naplate šte se radi sa originalnim delovima, čime dobijate maksimalan iznos naplate.</p>
              </div>
            </div>

            <div className="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
              <div className="service-item position-relative">
                <div className="icon">
                  <i class="fa-solid fa-map-pin"></i>
                </div>
                <h4>
                  <Link className="stretched-link">Dolazimo po dogovoru na željenu adresu.</Link>
                </h4>
                <p>Kako bi Vam olakšali neželjenu situaciju sa nazgodom vozila, u dogovoru sa Vam dolazimo na željenu adresu.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Features;
