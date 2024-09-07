import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './Hero.module.css';

import bgImage from '../../../assets/img/hero-bg.jpg';

const Hero = ({ handleClick }) => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} alt="" data-aos="fade-in" />

        <div className={`${classes.container} container`}>
          <div className="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8">
              <h2>
                Centar za polise i štete
                {/* <!-- <span>.</span> --> */}
              </h2>
              <p>Vaš lični konsultant za osiguranje</p>
            </div>
          </div>
          <div className="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div className={classes['icon-box']}>
                <i className="fa-solid fa-file-circle-check pb-3"></i>
                <h3>
                  <Link>
                    <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                  </Link>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div className={classes['icon-box']}>
                <i className="fa-solid fa-handshake pb-3"></i>
                <h3>
                  <Link>
                    <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                  </Link>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div className={classes['icon-box']}>
                <i className="fa-solid fa-magnifying-glass pb-3"></i>
                <h3>
                  <Link>
                    <b>UPOREDITE CENE</b> <br /> i dogovorite za sebe <b>polisu</b> osiguranja za sebe!
                  </Link>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
              <div className={classes['icon-box']}>
                <i className="fa-solid fa-comments-dollar pb-3"></i>
                <h3>
                  <Link>
                    <b>NAPLATITE ŠTETU </b> <br /> od osiguranja - NAJBOLJA NAPLATA!
                  </Link>
                </h3>
              </div>
            </div>
          </div>
          <div className="col-12 text-center" style={{ marginTop: `70px` }} data-aos="fade-up" data-aos-delay="500">
            <button
              className={classes.button}
              onClick={() => {
                handleClick();
              }}
            >
              <span className={classes['button_lg']}>
                <span className={classes['button_sl']}></span>
                <span className={classes['button_text']}>
                  {' '}
                  Zašto je bolje zaključiti osiguranje preko zastupnika, nego direktno preko osiguravajuće kuće?
                  <br />
                  Detaljnije
                </span>
              </span>
            </button>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
