import React, { Fragment } from 'react';

import './Hero.css';

const Hero = () => {
  return (
    <Fragment>
      <section id="hero" className="hero section dark-background">
        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in" />

        <div className="container text-left" data-aos="fade-up" data-aos-delay="100">
          <div className="row justify-content-start">
            <div className="col-lg-8">
              <h2>Reserviši odmah za nezaboravno iskustvo u Presidents 011</h2>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
