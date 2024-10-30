import React, { Fragment } from 'react';
import { Link } from 'react-router-dom';

import './AboutUs.css';

const AboutUs = () => {
  return (
    <Fragment>
      <section id="about" className="about section">
        <div className="container section-title" data-aos="fade-up">
          <span>
            O Nama
            <br />
          </span>
          <h2>
            O Nama
            <br />
          </h2>
        </div>

        <div className="container">
          <div className="row gy-4">
            <div className="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/about.jpg" className="img-fluid rounded" alt="" />
            </div>

            <div className="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
              <h3>Najbolji provod u gradu</h3>
              <p className="fst-italic py-4">
                Uživo muzika, najbolje cene i usluga u centru grada. Ovo je mesto duge tradicije i provoda koji se zauvek pamti. Svako ko nas je barem jednom posetio, ponovo se rado vratio i ponovo
                doživeo pravu čaroliju provoda koji nudimo. <b>Reservišite sto: +381 123 456</b>
              </p>
              <Link to="/o-nama" className="read-more rounded">
                <span>Više o nama</span>
                <i className="bi bi-arrow-right"></i>
              </Link>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default AboutUs;
