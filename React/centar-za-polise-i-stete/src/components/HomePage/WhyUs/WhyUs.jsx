import React, { Fragment, useEffect } from 'react';

import './WhyUs.css';

const WhyUs = () => {
  return (
    <Fragment>
      <section id="features" className="features section">
        <div className="container section-title" data-aos="fade-up">
          <h2>Zašto da Vas mi savetujemo kako i gde da osigurate kasko za Vaše vozilo?</h2>
        </div>

        <div className="container">
          <div className="row justify-content-between">
            <div className="col-lg-12 d-flex align-items-center">
              <ul className="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-solid fa-piggy-bank"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Uštedećete vreme</h4> --> */}
                      <p>
                        <b>Uštedećete novac</b> - jer znamo kako da najrentabilnije osigurate svoje vozilo. Pronađemo polisu koja odgovara vašim potrebama i budžetu, osiguravajući najbolju vrednost za
                        vaš novac.
                      </p>
                    </div>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-regular fa-clock"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Uštedećete vreme</h4> --> */}
                      <p>
                        <b>Uštedećete vreme</b> - na tržištu osiguranja posluje preko deset osiguravajućih kuća. Odlaskom u sve osiguavajuće kuće, izgubićete vreme. A vreme je novac.
                      </p>
                    </div>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-solid fa-info"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">BESPLATAN SAVET</h4> --> */}
                      <p>Bićete adekvatno obeštećeni kod štetnog događaja, jer ćete imati adkevatno pokriće na polisi i imaćete nas kao savetnika za prijavu i naplatu štete.</p>
                    </div>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-solid fa-handshake-simple"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">BESPLATAN SAVET</h4> --> */}
                      <p>
                        <b>BESPLATAN SAVET</b> - potpuno besplatno, bez ikakvih skrivenih troškova je naša pomoć <b>MI ZASTUPAMO VAS I VAŠE INTERESE KOD OSIGURAVAJUĆIH KUĆA!</b>
                      </p>
                    </div>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-solid fa-list-check"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Bez sitnih slova polisa</h4> --> */}
                      <p>
                        <b>Bez sitnih slova polisa</b> - mi ćemo Vam ih pročitati/protumačiti umesto Vas. Savetovaćemo Vas na koji deo Uslova da posebno obratite pažnju prilikom ugovaranja polise
                        (najbitnije je dobro pročitati Isključenja na polisi!)
                      </p>
                    </div>
                  </a>
                </li>
                <li className="nav-item">
                  <a className="nav-link active show">
                    <i className="fa-solid fa-circle-exclamation"></i>
                    <div>
                      {/* <!-- <h4 className="d-none d-lg-block">Štete</h4> --> */}
                      <p>
                        <b>Štete</b> - Ako imate štetu, mi ćemo Vam pomoći da taj događaj prevaziđete što lakše. U našem timu imamo i advokate, procenitelje šteta, sudske veštake…
                      </p>
                    </div>
                  </a>
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
