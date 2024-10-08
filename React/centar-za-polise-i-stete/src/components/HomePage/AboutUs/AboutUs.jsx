import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './AboutUs.module.css';

import aboutImg from '../../../assets/img/about.jpg';
import icon1 from '../../../assets/img/icon/icon-04-primary.png';
import icon2 from '../../../assets/img/icon/icon-03-primary.png';

const AboutUs = () => {
  return (
    <Fragment>
      <div className="container-xxl " style={{ paddingBottom: `50px`, paddingTop: `50px` }} data-aos="fade-up">
        <div className="container">
          <div className="row g-5">
            <div className="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
              <div className="position-relative overflow-hidden rounded ps-5 pt-5 h-100" style={{ minHeight: `400px` }}>
                <img className="position-absolute w-100 h-100" src={aboutImg} alt="" style={{ objectFit: `cover` }} />
                <div className="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3" style={{ width: `200px`, height: '200px' }}>
                  <div className="d-flex flex-column justify-content-center text-center rounded h-100 p-3" style={{ backgroundColor: `#56b8e6` }}>
                    <h1 className="text-white mb-0">30</h1>
                    <h2 className="text-white">Godina</h2>
                    <h5 className="text-white mb-0">Iskustva</h5>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
              <div className="h-100">
                <h1 style={{ fontWeight: `bold` }} className="display-6 mb-4">
                  Tu smo da vam pomognemo u istraživanju osiguranja.
                </h1>
                <p className="fs-5 text-primary mb-3">POTPUNO BESPLATNA USLUGA za polise.</p>
                <div className="row g-4 mb-4">
                  <div className="col-sm-6">
                    <div className="d-flex align-items-center">
                      <img className="flex-shrink-0 me-3" src={icon1} alt="" />
                      <h5 style={{ fontWeight: `bold` }} className="mb-0">
                        POLISE
                      </h5>
                    </div>
                  </div>
                  <div className="col-sm-6">
                    <div className="d-flex align-items-center">
                      <img className="flex-shrink-0 me-3" src={icon2} alt="" />
                      <h5 style={{ fontWeight: `bold` }} className="mb-0">
                        NAPLATA ŠTETE
                      </h5>
                    </div>
                  </div>
                </div>
                <p className="mb-4">
                  Putem našeg portala ćete dobiti korisne savete o osiguranju, ponude za osiguranje, pomoć pri naplati šteti, razno vezano za osiguranje (polise, sve osiguravajuće kuće, štete)
                </p>
                <div className="border-top mt-4 pt-4 d-flex align-items-center">
                  <div className="d-flex flex-column align-items-center">
                    <h5 style={{ fontWeight: `bold` }} className="mb-2">
                      <a href="tel:+381608060001">Pozovite nas: +381 60 80 60 001</a>
                    </h5>
                    {/* <!-- <div className="social-links d-flex justify-content-center align-items-center">
                    <div className="m-2 d-flex justify-content-center align-items-center"
                      style="width: 50px; height: 50px; border-radius: 50%; background-color: #8f5db7;">
                      <i className="bi bi-whatsapp" style="font-size: 20px; color: #fff;"></i>
                    </div>
                    <div className="m-2 d-flex justify-content-center align-items-center"
                      style="width: 50px; height: 50px; border-radius: 50%; background-color: #25d366;">
                      <i className="bi bi-whatsapp" style="font-size: 20px; color: #fff;"></i>
                    </div>
                    <div className="m-2 d-flex justify-content-center align-items-center"
                      style="width: 50px; height: 50px; border-radius: 50%; background-color: #0489c9;">
                      <i className="bi bi-envelope" style="font-size: 20px; color: #fff;"></i>
                    </div>
                  </div> --> */}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div id="services" className={`${classes.services} section`}>
            <div className="container section-title pb-5" data-aos="fade-up">
              <h2>Od nas dobijate:</h2>
            </div>

            <div className="container">
              <div className="row gy-4">
                <div className="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
                  <div className={`${classes['service-item']} d-flex`}>
                    <div className={`${classes.icon} flex-shrink-0`}>
                      <i className="fa-solid fa-file-circle-check pb-3"></i>
                    </div>
                    <div>
                      <h4 className={classes.title}>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('contact').offsetTop;
                            window.scrollTo({ top: y - 180, behavior: 'smooth' });
                          }}
                        >
                          <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                        </Link>
                      </h4>
                    </div>
                  </div>
                </div>

                <div className="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
                  <div className={`${classes['service-item']} d-flex`}>
                    <div className={`${classes.icon} flex-shrink-0`}>
                      <i className="fa-solid fa-handshake pb-3"></i>
                    </div>
                    <div>
                      <h4 className={classes.title}>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('contact').offsetTop;
                            window.scrollTo({ top: y - 180, behavior: 'smooth' });
                          }}
                        >
                          <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                        </Link>
                      </h4>
                    </div>
                  </div>
                </div>

                <div className="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
                  <div className={`${classes['service-item']} d-flex`}>
                    <div className={`${classes.icon} flex-shrink-0`}>
                      <i className="fa-solid fa-magnifying-glass pb-3"></i>
                    </div>
                    <div>
                      <h4 className={classes.title}>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('contact').offsetTop;
                            window.scrollTo({ top: y - 180, behavior: 'smooth' });
                          }}
                        >
                          <b>UPOREDITE CENE</b> <br /> i dogovorite <b>polisu</b> osiguranja za sebe!
                        </Link>
                      </h4>
                    </div>
                  </div>
                </div>

                <div className="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
                  <div className={`${classes['service-item']} d-flex`}>
                    <div className={`${classes.icon} flex-shrink-0`}>
                      <i className="fa-solid fa-comments-dollar pb-3"></i>
                    </div>
                    <div>
                      <h4 className={classes.title}>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('contact').offsetTop;
                            window.scrollTo({ top: y - 180, behavior: 'smooth' });
                          }}
                        >
                          <b>NAPLATITE ŠTETU </b> <br /> od osiguranja - NAJBOLJA NAPLATA!
                        </Link>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default AboutUs;
