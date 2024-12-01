import React from 'react';

import classes from './ModalButton.module.css';

import click from '../../../../assets/img/icon/click1.gif';

const ModalButton = ({ handleClick }) => {
  return (
    <div className="col-12 text-center" style={{ marginTop: `70px` }} data-aos="fade-up" data-aos-delay="200">
      <button
        className={classes.button}
        onClick={() => {
          handleClick();
        }}
      >
        <img src={click} alt="" className={classes.clickIcon} />
        <span className={classes['button_lg']}>
          <span className={classes['button_sl']}></span>
          <span className={classes['button_text']}>
            <p>Zašto je bolje zaključiti osiguranje preko zastupnika, nego direktno preko osiguravajuće kuće?</p>
            <small style={{ fontWeight: `bold`, textTransform: `none`, fontSize: `14px` }}>
              Saznajte više <i className="fa-solid fa-caret-right"></i>
            </small>
          </span>
        </span>
      </button>
    </div>
  );
};

export default ModalButton;
