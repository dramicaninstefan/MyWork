import React from 'react';

import classes from './ModalButton.module.css';

const ModalButton = ({ handleClick }) => {
  return (
    <div className="col-12 text-center" style={{ marginTop: `70px` }} data-aos="fade-up" data-aos-delay="500">
      <button
        className={classes.button}
        onClick={() => {
          handleClick();
        }}
      >
        <span className={classes['button_lg']}>
          <span className={classes['button_sl']}></span>
          <span className={classes['button_text']}>
            Zašto je bolje zaključiti osiguranje preko zastupnika, nego direktno preko osiguravajuće kuće?
            <br />
            <br />
            <small style={{ fontWeight: `bold`, textTransform: `none` }}>
              Saznajte viŠe <i className="fa-solid fa-caret-right"></i>
            </small>
          </span>
        </span>
      </button>
    </div>
  );
};

export default ModalButton;
