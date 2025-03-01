import React, { Fragment, useEffect } from 'react';

import classes from './WhyUsPage.module.css';

const WhyUsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <div className={`${classes.modal} container`}>
        <div className={classes.container} data-aos="fade-down">
          <div className={classes.nav}>
            <h3>Zašto je bolje zaključiti osiguranje preko zastupnika, nego direktno preko osiguravajuće kuće?</h3>
          </div>
          <div className={classes.list}>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Zastupnik zastupa Vaše interese.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Spremiće Vam ponude svih osiguravajućih kuća, potpuno besplatno, na jednom mestu
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Cena Vam je zagarantovano ista kao da ste otišli u osiguravajuću kuće, a neretko i niža zbog mogućnosti
                zastupnika za pregovaranje
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Nećete morati da obilazite osiguravajuće kuće, nećete trošiti vreme za to.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Zastupnik će Vas razumeti, razumeće Vaše potrebe za osiguranjem
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                {' '}
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Dobicete ponudu koja namenjena baš Vama, Vašim potrebama.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Dobićete polisu bez sitnih slova.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Dobićete organizaciju naplate štete besplatno.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Ako budete imali bilo kakvu nejasnoću, neprijatnost sa osiguravajućom kućom, zastupnik će Vam to rešiti.
              </h3>
            </div>
            <div className={classes.num}>
              <h3>
                <i style={{ paddingRight: `10px` }} className="fa-solid fa-caret-right"></i> Zastupnik će za posao koji donese osiguravajućoj kući dobiti određenu novčanu naknadu, te mu je u interesu
                da posao završi na Vaše veliko zadovoljstvo i to na duge staze (ne samo za jednu godinu) i trebate mu za preporuku kod Vaše okoline.
              </h3>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default WhyUsPage;
