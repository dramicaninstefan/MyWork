import React, { Fragment } from 'react';

import './Hero.css';

const Hero = () => {
  return (
    <Fragment>
      <section id="hero" className="hero section dark-background">
        <img src="assets/img/hero-bg1.jpg" alt="" data-aos="fade-in" />

        <div className="container">
          <div className="row justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
            <div className="col-xl-8 col-lg-8">
              <h2>
                Centar za polise i štete
                {/* <span>.</span> */}
              </h2>
              <p>Vaš lični konsultant za osiguranje</p>
            </div>
          </div>

          <div className="row gy-4 mt-5 justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div className="icon-box">
                <i className="fa-solid fa-file-circle-check pb-3"></i>
                <h3>
                  <a>
                    <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                  </a>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
              <div className="icon-box">
                <i className="fa-solid fa-handshake pb-3"></i>
                <h3>
                  <a>
                    <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                  </a>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
              <div className="icon-box">
                <i className="fa-solid fa-magnifying-glass pb-3"></i>
                <h3>
                  <a>
                    <b>UPOREDITE CENE</b> <br /> i dogovorite za sebe <b>polisu</b> osiguranja za sebe!
                  </a>
                </h3>
              </div>
            </div>
            <div className="col-xl-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
              <div className="icon-box">
                <i className="fa-solid fa-comments-dollar pb-3"></i>
                <h3>
                  <a>
                    <b>NAPLATITE ŠTETU </b> <br /> od osiguranja - NAJBOLJA NAPLATA!
                  </a>
                </h3>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Hero;
