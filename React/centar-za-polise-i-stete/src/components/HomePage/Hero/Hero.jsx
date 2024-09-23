import React from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../assets/img/hero-bg.jpg';
import { Link } from 'react-router-dom';

const Hero = ({ handleClick }) => {
  return (
    <section id="hero" className={`${classes.hero} section dark-background`}>
      <img src={bgImage} alt="" data-aos="fade-in" />

      <div className={`${classes.container} container`}>
        <div className="row">
          <div className="col-xl-4">
            <h1 data-aos="fade-up">CENTAR ZA POLISE I ŠTETE</h1>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis cum recusandae eum laboriosam voluptatem repudiandae odio, vel exercitationem officiis provident minima. </p>
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
      </div>
    </section>
  );
};

export default Hero;
