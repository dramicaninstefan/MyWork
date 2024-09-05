import React, { Fragment } from 'react';

import classes from './Modal.module.css';

const Modal = ({ handleClick }) => {
  return (
    <Fragment>
      <div className={classes.backdrop}>
        <div className={classes.modal}>
          <i
            className="fa-regular fa-rectangle-xmark"
            onClick={(e) => {
              handleClick();
            }}
          ></i>

          <ul>
            <li>Zastupnik zastupa Vaše interese.</li>
            <li>Spremiće Vam ponude svih osiguravajućih kuća, potpuno besplatno, na jednom mestu</li>
            <li>Cena Vam je zagarantovano ista kao da ste otišli u osiguravajuću kuće, a neretko i niža zbog mogućnosti zastupnika za pregovaranje</li>
            <li>Nećete morati da obilazite osiguravajuće kuće, nećete trošiti vreme za to.</li>
            <li>Zastupnik će Vas razumeti, razumeće Vaše potrebe za osiguranjem</li>
            <li>Dobicete ponudu koja namenjena baš Vama, Vašim potrebama.</li>
            <li>Dobićete polisu bez sitnih slova.</li>
            <li>Dobićete organizaciju naplate štete besplatno.</li>
            <li>Ako budete imali bilo kakvu nejasnoću, neprijatnost sa osiguravajućom kućom, zastupnik će Vam to rešiti.</li>
            <li>
              Zastupnik će za posao koji donese osiguravajućoj kući dobiti određenu novčanu naknadu, te mu je u interesu da posao završi na Vaše veliko zadovoljstvo i to na duge staze (ne samo za
              jednu godinu) i trebate mu za preporuku kod Vaše okoline.
            </li>
          </ul>
        </div>
      </div>
    </Fragment>
  );
};

export default Modal;
