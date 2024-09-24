import React, { Fragment, useEffect } from 'react';

import classes from './Modal.module.css';

import video from '../../../assets/video/kosmomi.mp4';

const Modal = ({ handleClick }) => {
  useEffect(() => {
    document.getElementById('vid').play();
  });
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
            <video id="vid" controls autoplay className={`${classes.video} rounded`} controlsList="nodownload">
              <source src={video} type="video/mp4" />
              Your browser does not support the video tag.
            </video>
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
    </Fragment>
  );
};

export default Modal;
