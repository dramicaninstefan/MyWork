import React, { Fragment, useEffect } from 'react';
import { Link } from 'react-router-dom';

import './ContactPage.css';

const AboutUsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <div className="page-title dark-background">
        <div className="position-relative">
          <h1>Kontakt</h1>
          <nav className="breadcrumbs">
            <ol>
              <li>
                <Link to="/">Početna</Link>
              </li>
              <li className="current">Kontakt</li>
            </ol>
          </nav>
        </div>
      </div>

      <section id="contact" className="contact section">
        <div className="container" data-aos="fade-up" data-aos-delay="100">
          <div className="row gy-4">
            <div className="col-lg-12 ">
              <div className="row gy-4">
                <div className="col-lg-12">
                  <div className="info-item d-flex flex-column justify-content-center align-items-center rounded" data-aos="fade-up" data-aos-delay="200">
                    <i className="bi bi-geo-alt"></i>
                    <h3>Adresa</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div>

                <div className="col-md-6">
                  <div className="info-item d-flex flex-column justify-content-center align-items-center rounded" data-aos="fade-up" data-aos-delay="300">
                    <i className="bi bi-telephone"></i>
                    <h3>Pozovite nas</h3>
                    <p>+1 5589 55488 55</p>
                  </div>
                </div>

                <div className="col-md-6">
                  <div className="info-item d-flex flex-column justify-content-center align-items-center rounded" data-aos="fade-up" data-aos-delay="400">
                    <i className="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p>info@example.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div className="mt-5 container" data-aos="fade-up" data-aos-delay="200">
          <iframe
            title="maps"
            style={{ border: `0`, width: `100%`, height: `370px` }}
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
            frameborder="0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </section>
    </Fragment>
  );
};

export default AboutUsPage;
