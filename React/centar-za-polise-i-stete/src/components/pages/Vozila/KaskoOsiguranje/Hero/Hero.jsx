import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../../assets/img/kasko-hero-bg.jpg';
import { Link } from 'react-router-dom';
import ModalButton from '../../../../UI/Modal/ModalButton/ModalButton';

const Hero = ({ handleClick }) => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} className={classes.bgImage} alt="" data-aos="fade-in" />
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
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="300">
                        {/* <i className="bi bi-clipboard-data"></i> */}
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
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="500">
                        {/* <i className="bi bi-inboxes"></i> */}
                        <h4>
                          Delimično kasko <br /> osiguranje
                        </h4>
                        <p style={{ minHeight: '140px' }}>Lom i oštećenje stakala, troškovi vuče ili prevoza putničkog vozila do mesta prebivališta, lom i oštećenje farova na vozilu, drugo</p>
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
                      <div className={classes['icon-box']} data-aos="zoom-out" data-aos-delay="400">
                        {/* <i className="bi bi-gem"></i> */}
                        <h4>Dopunska osiguranja</h4>
                        <p style={{ minHeight: '140px' }}>Dopunski rizik krađe i dopusnki rizik utaje</p>
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

            <div className={`${classes.container} container`}>
              <div className="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div className="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="100">
                  <div className={classes['icon-box']}>
                    <i className="fa-solid fa-file-circle-check pb-3"></i>
                    <h3>
                      <Link>
                        <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                      </Link>
                    </h3>
                  </div>
                </div>
                <div className="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="200">
                  <div className={classes['icon-box']}>
                    <i className="fa-solid fa-handshake pb-3"></i>
                    <h3>
                      <Link>
                        <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                      </Link>
                    </h3>
                  </div>
                </div>
                <div className="col-xl-4 col-md-4" data-aos="fade-up" data-aos-delay="300">
                  <div className={classes['icon-box']}>
                    <i className="fa-solid fa-magnifying-glass pb-3"></i>
                    <h3>
                      <Link>
                        <b>UPOREDITE CENE</b> <br /> i dogovorite <b>polisu</b> osiguranja za sebe!
                      </Link>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <ModalButton handleClick={handleClick} />
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
