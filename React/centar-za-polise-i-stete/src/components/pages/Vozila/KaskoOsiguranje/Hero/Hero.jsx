import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../../assets/img/kasko-hero-bg.jpg';

const Hero = () => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} alt="" data-aos="fade-in" />

        <div className={`${classes.container} container`}>
          <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8 py-5">
              <h2>
                Kasko osigruganje vozila
                {/* <!-- <span>.</span> --> */}
              </h2>
            </div>
            <div className="container">
              <div className={`${classes['info-box']} col-xl-6 col-md-12 rounded`}>
                <div className={`${classes['info-box-content']} col-xl-6 col-md-12 align-self-center py-3`}>
                  <h2 className="py-3">Vaši benefiti</h2>
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
                </div>
                <div className={`${classes['info-box-content']} col-xl-6 align-self-center d-flex flex-md-column py-3`}>
                  <button className={`${classes.btn1} btn  align-self-center`}>Prijava štete</button>
                  <button className={`${classes.btn2} btn align-self-center`}>Info ponude</button>
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
