import React, { Fragment } from 'react';

import './Appointment.css';

const Appointment = () => {
  return (
    <Fragment>
      <div className="container-fluid appointment my-5 wow fadeIn" data-wow-delay="0.1s" style={{ paddingBlock: '80px' }}>
        <div className="container-xxl py-5">
          <div className="container">
            <div className="container section-title" data-aos="fade-up" style={{ maxWidth: `500px` }}>
              <span>
                Lista pića
                <br />
              </span>
              <h2>Lista pića</h2>
            </div>
            <div className="row g-5">
              <div className="col-lg-3 d-none d-lg-block">
                <div className="testimonial-left h-100">
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-1.jpg" alt="" />
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-2.jpg" alt="" />
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-3.jpg" alt="" />
                </div>
              </div>
              <div className="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div className="owl-carousel testimonial-carousel">
                  <div className="testimonial-item text-center">
                    <img className="img-fluid rounded mx-auto mb-4" src="img/testimonial-1.jpg" alt="" />
                    <p className="fs-5">
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos molestias aliquid enim, unde numquam, fugiat, molestiae corrupti voluptatum et aut sit! Magni expedita quia quae.
                      Obcaecati numquam dignissimos delectus nam. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae, consequuntur dicta aliquid sequi, dolores placeat maxime eveniet
                      nostrum nisi voluptatum dignissimos, commodi iusto magnam aut et? Perferendis eius libero architecto! Natus libero voluptatum dignissimos doloremque, dolore eligendi tempore eius
                      labore sit veniam magnam eveniet reiciendis rerum illum nemo minima. Similique necessitatibus non porro ullam consequuntur, laboriosam expedita beatae atque iusto.
                    </p>
                    <h5>Client Name</h5>
                    <span>Profession</span>
                  </div>
                </div>
              </div>
              <div className="col-lg-3 d-none d-lg-block">
                <div className="testimonial-right h-100">
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-1.jpg" alt="" />
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-2.jpg" alt="" />
                  <img className="img-fluid animated pulse infinite" src="assets/img/portfolio/portfolio-3.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Appointment;
