import React, { Fragment } from 'react';

import classes from './WhyUs.module.css';
import { Link } from 'react-router-dom';

const WhyUs = () => {
  return (
    <Fragment>
      <section id="features" className={`${classes.features} section`}>
        <div className="container section-title" data-aos="fade-up">
          <h2>Zašto da Vas mi savetujemo kako i gde da uradite osiguranje, kako da naplatite štetu?</h2>
        </div>

        <div className="container">
          <div className="row justify-content-between">
            <div className="col-lg-12 d-flex align-items-center">
              <ul className={`${classes['nav-tabs']} nav nav-tabs`} data-aos="fade-up" data-aos-delay="100">
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-solid fa-handshake-simple"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">BESPLATAN SAVET</h4> --> */}
                      <p>
                        <b>BESPLATAN SAVET</b> - potpuno besplatno, bez ikakvih skrivenih troškova je naša pomoć <b>MI ZASTUPAMO VAS I VAŠE INTERESE KOD OSIGURAVAJUĆIH KUĆA!</b>
                      </p>
                    </div>
                  </Link>
                </li>
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-solid fa-piggy-bank"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Uštedećete vreme</h4> --> */}
                      <p>
                        <b>Uštedećete novac</b> – jer znamo kako, kod koje osiguravajuće kuće i na najbolji način da uradite osiguranje. Pronaćićemo polisu koja odgovara Vašem budžetu i Vašim
                        potrebama, obezbeđujući najbolju vrednost za Vaš novac.
                      </p>
                    </div>
                  </Link>
                </li>
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-regular fa-clock"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Uštedećete vreme</h4> --> */}
                      <p>
                        <b>Uštedećete vreme</b> - na tržištu osiguranja posluje preko deset osiguravajućih kuća. Odlaskom u sve osiguavajuće kuće izgubićete vreme. A vreme je novac.
                      </p>
                    </div>
                  </Link>
                </li>
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-solid fa-info"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">BESPLATAN SAVET</h4> --> */}
                      <p>
                        <b>Bićete adekvatno obeštećeni kod štetnog događaja</b>, jer ćete imati adkevatno pokriće na polisi i imaćete nas kao savetnika za prijavu i naplatu štete.
                      </p>
                    </div>
                  </Link>
                </li>
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-solid fa-list-check"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Bez sitnih slova polisa</h4> --> */}
                      <p>
                        <b>Bez sitnih slova polisa</b> - mi ćemo Vam ih pročitati/protumačiti umesto Vas. Savetovaćemo Vas na koji deo Uslova da posebno obratite pažnju prilikom ugovaranja polise
                        (najbitnije je dobro pročitati Isključenja na polisi!)
                      </p>
                    </div>
                  </Link>
                </li>
                <li className={classes['nav-item']}>
                  <Link className={`${classes['nav-link']} active show`}>
                    <i className="fa-solid fa-circle-exclamation"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Štete</h4> --> */}
                      <p>
                        <b>Štete</b> - Ako imate štetu, mi ćemo Vam pomoći da taj događaj prevaziđete što lakše. U našem timu imamo i advokate, procenitelje šteta, sudske veštake…
                      </p>
                    </div>
                  </Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      ;
    </Fragment>
  );
};

export default WhyUs;
