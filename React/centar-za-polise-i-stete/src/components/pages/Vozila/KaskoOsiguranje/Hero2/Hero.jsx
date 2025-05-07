import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../../assets/img/kasko-hero-bg.jpg';
import { Link } from 'react-router-dom';
import ModalButton from '../../../../UI/Modal/ModalButton/ModalButton';
import InfiniteLooperMini from '../../../../UI/InfiniteLooperMini/InfiniteLooper';

const Hero = ({ handleClick }) => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section accent-background`}>
        <img src={bgImage} className={classes.bgImage} alt="" data-aos="fade-in" />

        <div className={`${classes.container} container position-relative pt-5`} data-aos="fade-up" data-aos-delay="100">
          <div className="row gy-5 justify-content-between">
            <div className="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <h2>
                <span>KASKO OSIGURANJE</span>
              </h2>
            </div>
            <div className="col-lg-5 order-1 order-lg-2">
              <img src="assets/img/hero-img.svg " className="img-fluid" alt="" />
            </div>
          </div>
        </div>

        <div className={`${classes['icon-boxes']} position-relative`} data-aos="fade-up" data-aos-delay="200">
          <div className="container position-relative">
            <div className="row gy-4 mt-5">
              <div className="col-xl-3 col-md-6">
                <div className={`${classes['icon-box']}`}>
                  <h4 className={classes.title}>
                    <Link className="stretched-link">
                      <b>VIŠE OD 25</b> ponuda bez skrivenih troškova, kod <b>SVIH OSIGURAVAJUĆIH KUĆA</b>
                    </Link>
                  </h4>
                </div>
              </div>

              <div className="col-xl-3 col-md-6">
                <div className={`${classes['icon-box']}`}>
                  <h4 className={classes.title}>
                    <Link className="stretched-link">
                      <b>BESPLATNE PONUDE</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                    </Link>
                  </h4>
                </div>
              </div>

              <div className="col-xl-3 col-md-6">
                <div className={`${classes['icon-box']}`}>
                  <h4 className={classes.title}>
                    <Link className="stretched-link">
                      <b>ISTA CENA</b> kao i direktno kod osiguravajućih kuća – bez dodatnih troškova.
                    </Link>
                  </h4>
                </div>
              </div>

              <div className="col-xl-3 col-md-6">
                <div className={`${classes['icon-box']}`}>
                  <h4 className={classes.title}>
                    <Link className="stretched-link">
                      <b>BESPLATNA</b> pomoć u organizaciji naplate štete za naše klijente.
                    </Link>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <InfiniteLooperMini />

      <div className="container-fluid py-3" style={{ backgroundColor: '#ebebeb' }}>
        <div className="container ">
          <div className="row justify-content-start text-left my-5" data-aos="fade-up" data-aos-delay="100">
            <div className={`${classes.content} row gy-4`} style={{ margin: `auto` }}>
              <div className="col-lg-4 d-flex align-items-stretch">
                <div className={classes['why-box']} data-aos="zoom-out" data-aos-delay="200">
                  <h3 style={{ textTransform: `uppercase` }}>Šta pokriva kasko osiguranje?</h3>
                  <ul>
                    <li>
                      <p>Kasko osiguranje štiti vaše vozilo od:</p>
                    </li>
                    <li>
                      <p>
                        1. <b>UDARA</b> - kada neko ili nešto udari u Vaše vozilo
                      </p>
                    </li>
                    <li>
                      <p>
                        2. <b>SUDARA</b> - kada se sudarite svojom krivicom, ali niste pod dejstvom alkohola i slično
                      </p>
                    </li>
                    <li>
                      <p>
                        3. <b>KRAĐA</b> - kada Vam je vozilo ukradeno
                      </p>
                    </li>
                    <li className="mt-4">
                      <p>Sve to uz brzu i efikasnu isplatu štete!</p>
                    </li>
                  </ul>
                  <div className="text-center">
                    <Link
                      onClick={(e) => {
                        e.preventDefault();
                        const y = document.getElementById('contact').offsetTop;
                        window.scrollTo({ top: y - 180, behavior: 'smooth' });
                      }}
                      className={classes['more-btn']}
                    >
                      <span style={{ fontWeight: `bold` }}>Potraži ponude</span> <i className="bi bi-chevron-right"></i>
                    </Link>
                  </div>
                </div>
              </div>
              <div className="col-lg-8 d-flex align-items-stretch">
                <div className="d-flex flex-column justify-content-center">
                  <div className="row gy-4">
                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box-hero']} data-aos="zoom-out" data-aos-delay="300">
                        <h4>
                          Osnovno kasko <br /> osiguranje
                        </h4>
                        <p style={{ minHeight: '140px' }}>Saobraćajne rizike, požarne rizike, grupa prirodnih rizika, grupa rizika vandalizma, grupa ostalih rizika.</p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('osnovno').offsetTop;
                            window.scrollTo({ top: y - 150, behavior: 'smooth' });
                          }}
                          className={classes['more-btn']}
                        >
                          <span style={{ fontWeight: `bold` }}>Detaljnije</span> <i className="bi bi-chevron-right"></i>
                        </Link>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box-hero']} data-aos="zoom-out" data-aos-delay="500">
                        <h4>
                          Delimično kasko <br /> osiguranje
                        </h4>
                        <p style={{ minHeight: '140px' }}>Lom i oštećenje stakala, troškovi vuče ili prevoza putničkog vozila do mesta prebivališta, lom i oštećenje farova na vozilu, drugo.</p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('delimicno').offsetTop;
                            window.scrollTo({ top: y - 150, behavior: 'smooth' });
                          }}
                          className={classes['more-btn']}
                        >
                          <span style={{ fontWeight: `bold` }}>Detaljnije</span> <i className="bi bi-chevron-right"></i>
                        </Link>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box-hero']} data-aos="zoom-out" data-aos-delay="400">
                        <h4>Dopunska osiguranja</h4>
                        <p style={{ minHeight: '140px' }}>Dopunski rizik krađe i dopunski rizik utaje.</p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('dopunsko').offsetTop;
                            window.scrollTo({ top: y - 150, behavior: 'smooth' });
                          }}
                          className={classes['more-btn']}
                        >
                          <span style={{ fontWeight: `bold` }}>Detaljnije</span> <i className="bi bi-chevron-right"></i>
                        </Link>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <ModalButton handleClick={handleClick} />
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Hero;
