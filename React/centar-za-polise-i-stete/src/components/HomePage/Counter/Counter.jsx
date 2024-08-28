import React, { Fragment } from 'react';

import CountUp from 'react-countup';

import './Counter.css';

import image from '../../../assets/img/cta-bg.jpg';

const Counter = () => {
  return (
    <Fragment>
      <section id="call-to-action" className="call-to-action section dark-background">
        <img src={image} alt="" />
        <div className="container">
          <div className="row">
            <div className="four col-md-4">
              <div className="counter-box colored">
                {/* <!-- <i className="fa fa-thumbs-o-up"></i> --> */}
                <CountUp className="counter" start={0} end={376} duration={3}></CountUp>
                <p>Naši klijenti</p>
              </div>
            </div>
            <div className="four col-md-4">
              <div className="counter-box">
                {/* <!-- <i className="fa fa-group"></i> --> */}
                <CountUp className="counter" start={0} end={824} duration={3}></CountUp>
                <p>Zadovoljni klijenti</p>
              </div>
            </div>

            <div className="four col-md-4">
              <div className="counter-box">
                {/* <!-- <i className="fa fa-user"></i> --> */}
                <CountUp className="counter" start={0} end={1563} duration={3}></CountUp>
                <p>Kafa sa klijentima</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Counter;
