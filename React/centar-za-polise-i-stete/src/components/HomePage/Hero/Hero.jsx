import React from 'react';
import { Link } from 'react-router-dom';

import classes from './Hero.module.css';

import bgImage from '../../../assets/img/hero-bg.jpg';

const Hero = ({ handleClick }) => {
  return (
    <section id="hero" className={`${classes.hero} section dark-background`}>
      <img src={bgImage} alt="" data-aos="fade-in" />

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
              </p>
            </blockquote>
            <div className="d-flex" data-aos="fade-up" data-aos-delay="200">
              <Link
                className={classes['btn-get-started']}
                onClick={(e) => {
                  e.preventDefault();
                  const y = document.getElementById('contact').offsetTop;
                  window.scrollTo({ top: y - 180, behavior: 'smooth' });
                }}
              >
                Pošalji upit
              </Link>
              <Link alt="" className={`${classes['btn-watch-video']} d-flex align-items-center`} onClick={handleClick}>
                <i className="bi bi-play-circle"></i>
                <span>Ko smo mi?</span>
              </Link>
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
