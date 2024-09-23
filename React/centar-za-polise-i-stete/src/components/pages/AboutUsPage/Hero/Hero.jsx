import React, { Fragment } from 'react';

import classes from './Hero.module.css';

import bgImage from '../../../../assets/img/team-page-title-bg.jpg';

const Hero = ({ handleClick }) => {
  return (
    <Fragment>
      <section id="hero" className={`${classes.hero} section dark-background`}>
        <img src={bgImage} className={classes.bgImage} alt="" data-aos="fade-in" />
        <div className={`${classes.container} container`}>
          <div className="row justify-content-start text-left" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8 pt-5">
              <h2>Naš tim</h2>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
