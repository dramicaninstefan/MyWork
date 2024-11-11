import React from 'react';

import classes from './ModalButtonKasko.module.css';

import click from '../../../../assets/img/icon/click1.gif';

const ModalButtonKasko = ({ handleClick }) => {
  return (
    <div className="col-12 text-center container" style={{ marginTop: `70px` }} data-aos="fade-up" data-aos-delay="200">
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
            <p>Detaljan postupak izrade ponude, uključujući sve potrebne korake i informacije.</p>
            <small style={{ fontWeight: `bold`, textTransform: `none`, fontSize: `14px` }}>
              Saznajte više <i className="fa-solid fa-caret-right"></i>
            </small>
          </span>
        </span>
      </button>
    </div>
  );
};

export default ModalButtonKasko;
