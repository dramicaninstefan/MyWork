import React, { Fragment } from 'react';

import classes from './Modal.module.css';

const Modal = ({ handleClick }) => {
  return (
    <Fragment>
      <div className={classes.wrapper}>
        <div
          className={classes.backdrop}
          onClick={(e) => {
            handleClick();
          }}
        ></div>
        <div className={classes.modal}>
          <div className={classes.container} data-aos="fade-down">
            <div className={classes.list}>
              <div className=" text-center">
                <h1 className="display-3">Hvala Vam!</h1>
                <p className="lead">Uskoro će vas kontaktirati jedan od naših agenata.</p>
                <hr />
              </div>

              <div className={`${classes.num} d-flex align-content-center justify-content-center pt-3`}>
                <div
                  className={classes.button}
                  // data-tooltip="Zatvori"
                  onClick={(e) => {
                    handleClick();
                  }}
                >
                  <div className={classes['button-wrapper']}>
                    <div className={classes.text}>Zatvori</div>
                    <span className={classes.icon}>
                      <i className="fa-solid fa-xmark"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Modal;
