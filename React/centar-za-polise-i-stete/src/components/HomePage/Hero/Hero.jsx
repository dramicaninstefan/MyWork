import React from 'react';
import { Link } from 'react-router-dom';

import classes from './Hero.module.css';

import bgImage from '../../../assets/img/hero-bg.jpg';

import click from '../../../assets/img/icon/click1.gif';

const Hero = ({ handleClick }) => {
  return (
    <section id="hero" className={`${classes.hero} section dark-background`}>
      <img src={bgImage} className={classes.bgimage} alt="" data-aos="fade-in" />

      <div className={`${classes.container} container d-xl-flex`}>
        <div className="row col-xl-5 pr-0 pb-5 mt-5">
          <div className="col-xl-12">
            <h1 data-aos="fade-up">CENTAR ZA POLISE I ŠTETE</h1>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p>
                Mi smo zastupnička agencija za osiguranje koja ima ugovor sa <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>svim osiguravajućim kućama</span> u Srbiji.
                <br />
                <br />
                Bavimo se <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>svim vrstama osiguranja</span>, kao i organizacijom
                <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}> naplate štete </span>iz osiguranja.
                <br />
                <br />
                Naša usluga je prema Vama u potpunosti <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>BESPLATNA</span> za polise i bez skrivenih troškova.
              </p>
            </blockquote>
            <div className="d-xl-flex" data-aos="fade-up" data-aos-delay="200">
              <button
                className={classes.btn}
                style={{ marginRight: `15px` }}
                onClick={(e) => {
                  e.preventDefault();
                  const y = document.getElementById('contact').offsetTop;
                  window.scrollTo({ top: y - 180, behavior: 'smooth' });
                }}
              >
                <span>Pošalji upit</span>
              </button>

              <button className={`${classes.btn} mt-4 mt-xl-0`} onClick={handleClick}>
                <span>Ko smo mi?</span>
                <i className="fa-regular fa-circle-play"></i>
                <img src={click} alt="" className={classes.clickIcon} />
              </button>
            </div>
          </div>
        </div>

        <div className="row gy-4 col-xl-7 pr-0 justify-content-center pl-xl-5" data-aos="fade-up" data-aos-delay="200">
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-file-circle-check pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-handshake pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-magnifying-glass pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>UPOREDITE CENE</b> <br /> i dogovorite <b>polisu</b> osiguranja za sebe!
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-comments-dollar pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>NAPLATITE ŠTETU </b> <br /> od osiguranja - NAJBOLJA NAPLATA!
                </Link>
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Hero;
