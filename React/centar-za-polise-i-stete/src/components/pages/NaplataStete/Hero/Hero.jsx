import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../assets/img/stete-hero-bg.jpg';

const Hero = () => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} alt="" data-aos="fade-in" />

        <div className={`${classes.container} container`}>
          <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8 pt-5">
              <h2>Kasko osiguranje</h2>
            </div>

            <div className={`${classes.content} row gy-4`} style={{ margin: `auto` }}>
              <div className="col-lg-4 d-flex align-items-stretch">
                <div className={classes['why-box']} data-aos="zoom-out" data-aos-delay="200">
                  <h3 style={{ textTransform: `uppercase` }}>Kasko benefiti</h3>
                  <ul>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Širok spektar osiguranih rizika</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Osiguravajuća zaštita od delimičnog ili potpunog oštećenja vozila</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Mogućnost ugovaranja dopunskog osiguranja</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Brza i efikasna isplata šteta</p>
                    </li>
                  </ul>
                  <div className="text-center">
                    <a href="#contact" className={classes['more-btn']}>
                      <span style={{ fontWeight: `bold` }}>Potraži ponude</span> <i className="bi bi-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>

              <div className="col-lg-8 d-flex align-items-stretch">
                <div className="d-flex flex-column justify-content-center">
                  <div className="row gy-4">
                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="300">
                        {/* <i className="bi bi-clipboard-data"></i> */}
                        <h4>POTPUNO KASKO</h4>
                        <p>Potpuno kasko osiguranje pruža sveobuhvatnu zaštitu vozila, pokrivajući sve vrste šteta, uključujući one nastale krivicom vozača, krađu, vandalizam, i prirodne nepogode.</p>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="400">
                        {/* <i className="bi bi-gem"></i> */}
                        <h4>DOPUNSKO KASKO</h4>
                        <p>
                          Dopunsko kasko osiguranje obuhvata dodatnu zaštitu za specifične rizike koji nisu uključeni u osnovnu kasko polisu, kao što su štete usled vandalizma, krađe ili prirodnih
                          nepogoda.
                        </p>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="500">
                        {/* <i className="bi bi-inboxes"></i> */}
                        <h4>DELIMIČNO KASKO</h4>
                        <p>
                          Delimično kasko osiguranje pruža pokriće za odabrane rizike, kao što su krađa ili šteta od prirodnih nepogoda, ali ne uključuje sveobuhvatnu zaštitu koja se dobija sa
                          potpunim kasko osiguranjem.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
