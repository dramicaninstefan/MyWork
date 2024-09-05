import React, { Fragment } from 'react';

import classes from './Modal.module.css';

const Modal = ({ handleClick }) => {
  return (
    <Fragment>
      <div className={classes.backdrop}>
        <div className={classes.modal}>
          <div className={classes.container}>
            <div className={classes.nav}>
              <h4>Zašto je bolje zaključiti osiguranje preko zastupnika, nego direktno preko osiguravajuće kuće?</h4>
            </div>

            <div className={classes.list}>
              <div className={classes.num}>
                <h3>Zastupnik zastupa Vaše interese.</h3>
              </div>
              <div className={classes.num}>
                <h3>Spremiće Vam ponude svih osiguravajućih kuća, potpuno besplatno, na jednom mestu</h3>
              </div>
              <div className={classes.num}>
                <h3>Cena Vam je zagarantovano ista kao da ste otišli u osiguravajuću kuće, a neretko i niža zbog mogućnosti zastupnika za pregovaranje</h3>
              </div>
              <div className={classes.num}>
                <h3>Nećete morati da obilazite osiguravajuće kuće, nećete trošiti vreme za to.</h3>
              </div>
              <div className={classes.num}>
                <h3>Zastupnik će Vas razumeti, razumeće Vaše potrebe za osiguranjem</h3>
              </div>
              <div className={classes.num}>
                <h3> Dobicete ponudu koja namenjena baš Vama, Vašim potrebama.</h3>
              </div>
              <div className={classes.num}>
                <h3>Dobićete polisu bez sitnih slova.</h3>
              </div>
              <div className={classes.num}>
                <h3>Dobićete organizaciju naplate štete besplatno.</h3>
              </div>
              <div className={classes.num}>
                <h3>Ako budete imali bilo kakvu nejasnoću, neprijatnost sa osiguravajućom kućom, zastupnik će Vam to rešiti.</h3>
              </div>
              <div className={classes.num}>
                <h3>
                  Zastupnik će za posao koji donese osiguravajućoj kući dobiti određenu novčanu naknadu, te mu je u interesu da posao završi na Vaše veliko zadovoljstvo i to na duge staze (ne samo za
                  jednu godinu) i trebate mu za preporuku kod Vaše okoline.
                </h3>
              </div>

              <div className={`${classes.num} d-flex align-content-center justify-content-center pt-5`}>
                <button
                  className="btn btn-dark"
                  onClick={(e) => {
                    handleClick();
                  }}
                >
                  Zatvori
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default Modal;
