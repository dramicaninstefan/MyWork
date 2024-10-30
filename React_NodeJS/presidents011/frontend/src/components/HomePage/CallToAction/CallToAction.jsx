import React, { Fragment } from 'react';

import './CallToAction.css';

const CallToAction = () => {
  return (
    <Fragment>
      <section id="call-to-action" className="call-to-action section dark-background">
        <img src="assets/img/cta-bg.jpg" alt="" />

        <div className="container">
          <div className="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
            <div className="col-xl-10">
              <div className="text-center py-5"></div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default CallToAction;
