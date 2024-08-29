import React, { Fragment } from 'react';

import './InfiniteLooper.css';

import logo1 from '../../../assets/img/logo/ams-logo.png';
import logo2 from '../../../assets/img/logo/ddor-logo.png';
import logo3 from '../../../assets/img/logo/dunav-logo.png';
import logo4 from '../../../assets/img/logo/generali-logo.png';
import logo5 from '../../../assets/img/logo/globus-logo.png';
import logo6 from '../../../assets/img/logo/grawe-logo.png';
import logo7 from '../../../assets/img/logo/milenijum-logo.png';
import logo8 from '../../../assets/img/logo/sava-logo.png';
import logo9 from '../../../assets/img/logo/triglav-logo.png';
import logo10 from '../../../assets/img/logo/uniqa-logo.png';
import logo11 from '../../../assets/img/logo/wiener-logo.png';

const InfiniteLooper = () => {
  return (
    <Fragment>
      {/* <section className="slide-option">
        <div className="container">
          <h3 className="no-marg">slide start to finish infinite loop</h3>
        </div>
        <div id="stffull" className="highway-slider">
          <div className="container highway-barrier">
            <ul className="highway-lane">
              <li id="red" className="highway-car">
                <h4>I am not sure what something like this could be used for.</h4>
              </li>
              <li id="orange" className="highway-car">
                <h4>It looks pretty cool though, and functions well.</h4>
              </li>
              <li id="yellow" className="highway-car">
                <h4>As you read it, and wait for the next slide, it's almost hypnotizing.</h4>
              </li>
              <li id="green" className="highway-car">
                <h4>
                  Keep on reading and maybe I'll cast mind control on you... <span className="fas fa-hat-wizard"></span>
                </h4>
              </li>
              <li id="blue" className="highway-car">
                <h4>
                  <span className="fas fa-magic"></span> BOOM! magic. you're under mind control.
                </h4>
              </li>
            </ul>
          </div>
        </div>
      </section> */}

      <section className="wrapper slide-option">
        <div id="infinite" className="highway-slider">
          <div className="wrapper highway-barrier">
            <ul className="highway-lane">
              <li className="highway-car">
                <img src={logo1} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo2} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo3} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo4} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo5} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo6} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo7} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo8} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo9} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo10} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo11} alt="" />
              </li>

              {/*  */}
              <li className="highway-car">
                <img src={logo1} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo2} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo3} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo4} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo5} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo6} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo7} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo8} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo9} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo10} alt="" />
              </li>
              <li className="highway-car">
                <img src={logo11} alt="" />
              </li>
            </ul>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default InfiniteLooper;
