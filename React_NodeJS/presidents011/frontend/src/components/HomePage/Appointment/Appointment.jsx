import React, { Fragment } from 'react';

import './Appointment.css';

import coctail1 from '../../../assets/img/menu/coctail-1.jpg';
import coctail2 from '../../../assets/img/menu/coctail-2.jpg';
import coctail3 from '../../../assets/img/menu/coctail-3.jpg';
import coctail4 from '../../../assets/img/menu/coctail-4.jpg';
import coctail5 from '../../../assets/img/menu/coctail-5.jpg';
import coctail6 from '../../../assets/img/menu/coctail-6.jpg';

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
              <div className="col-lg-3 d-none d-lg-block" data-aos="fade-up">
                <div className="testimonial-left h-100">
                  <img className="img-fluid animated pulse infinite" src={coctail1} alt="" />
                  <img className="img-fluid animated pulse infinite" src={coctail2} alt="" />
                  <img className="img-fluid animated pulse infinite" src={coctail3} alt="" />
                </div>
              </div>
              <div className="col-lg-6 wow fadeIn" data-aos="fade-up" data-aos-delay="100">
                <img className="img-fluid" src="../../../assets/img/about.jpg" alt="" />
              </div>
              <div className="col-lg-3 d-none d-lg-block" data-aos="fade-up">
                <div className="testimonial-right h-100">
                  <img className="img-fluid animated pulse infinite" src={coctail4} alt="" />
                  <img className="img-fluid animated pulse infinite" src={coctail5} alt="" />
                  <img className="img-fluid animated pulse infinite" src={coctail6} alt="" />
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
