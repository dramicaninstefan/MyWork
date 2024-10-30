import React, { Fragment } from 'react';

import './Gallery.css';

const Gallery = () => {
  return (
    <Fragment>
      <section id="portfolio" className="portfolio section">
        <div className="container section-title" data-aos="fade-up">
          <span>
            Galerija
            <br />
          </span>
          <h2>Galerija</h2>
        </div>

        <div className="container">
          <div className="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div className="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
              {[1, 2, 3, 4, 5, 6].map((index) => (
                <div key={index} className="col-lg-4 col-md-6 portfolio-item isotope-item filter-portfolio">
                  <div className="portfolio-content h-100">
                    <img src={`assets/img/portfolio/portfolio-${index}.jpg`} className="img-fluid" alt="" />
                    <div className="portfolio-info">
                      <a href={`assets/img/portfolio/portfolio-${index}.jpg`} data-gallery="portfolio-gallery" className="glightbox preview-link">
                        <i className="bi bi-zoom-in"></i>
                      </a>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Gallery;
