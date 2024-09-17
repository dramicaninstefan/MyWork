import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../assets/img/stete-hero-bg.jpg';
import { Link } from 'react-router-dom';

const Hero = () => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} alt="" data-aos="fade-in" />

        <div className={`${classes.container} container`}>
          <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8 pt-5">
              <h2>Najbolja NAPLATA ŠTETE od osiguranja!</h2>
            </div>

            <div className={`${classes.content} row gy-4`} style={{ margin: `auto` }}>
              <div className="col-lg-4 d-flex align-items-stretch">
                <div className={classes['why-box']} data-aos="zoom-out" data-aos-delay="200">
                  <h3 style={{ textTransform: `uppercase` }}>Benefiti</h3>
                  <ul>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Najbolja naplata štete</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Bolja naplata nego da idete sami</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Ušteda vremena za naplatu</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Maksimalni iznosi naplate štete</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Brzo i efikasno vodimo ceo postupak</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Stručni tim (advokati, sudski veštaci…)</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Bez Vašeg troška u postupku</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>24/7 dostupnost</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Dolazak na teren</p>
                    </li>
                    <li>
                      <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(-5px)` }}></i>
                      <p>Moguća online naplata</p>
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
                      <span style={{ fontWeight: `bold` }}>Prijavi štetu</span> <i className="bi bi-chevron-right"></i>
                    </Link>
                  </div>
                </div>
              </div>

              <div className="col-lg-8 d-flex align-items-stretch">
                <div className="d-flex flex-column justify-content-center">
                  <div className="row gy-4">
                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="300">
                        {/* <i className="bi bi-clipboard-data"></i> */}
                        <h4>Naplata štete na vozilu</h4>
                        <p style={{ minHeight: '170px' }}>Najbolja naplata štete za vozila, sa maksimalni iznosima, u maksimalno kratkom roku.</p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('stete1').offsetTop;
                            window.scrollTo({ top: y - 150, behavior: 'smooth' });
                          }}
                          className={classes['more-btn']}
                        >
                          <span style={{ fontWeight: `bold` }}>Detaljnije</span> <i className="bi bi-chevron-right"></i>
                        </Link>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="400">
                        {/* <i className="bi bi-gem"></i> */}
                        <h4>Naplata štete za povrede</h4>
                        <p style={{ minHeight: '170px' }}>Naplata štete za povrede u saobraćaju, radnom mestu i drugo, sa maksimalnim iznosima, u maksimalno kratkom roku.</p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('stete2').offsetTop;
                            window.scrollTo({ top: y - 150, behavior: 'smooth' });
                          }}
                          className={classes['more-btn']}
                        >
                          <span style={{ fontWeight: `bold` }}>Detaljnije</span> <i className="bi bi-chevron-right"></i>
                        </Link>
                      </div>
                    </div>

                    <div className="col-xl-4 d-flex align-items-stretch">
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="500">
                        {/* <i className="bi bi-inboxes"></i> */}
                        <h4>Druge naplate štete</h4>
                        <p style={{ minHeight: '170px' }}>
                          Naplata štete zbog rupe na putu, pada drveta, povrede u autobusu, ujeda pasa, naplata štete na vozilu od ledenica …, kao i druge naplate od osiguranja
                        </p>
                        <Link
                          onClick={(e) => {
                            e.preventDefault();
                            const y = document.getElementById('stete3').offsetTop;
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
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
