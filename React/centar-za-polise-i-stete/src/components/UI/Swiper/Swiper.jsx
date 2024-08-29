import React, { Fragment } from 'react';

import './Swiper.css';

import image from '../../../assets/img/why-us-bg.jpg';

const Swiper = () => {
  return (
    <Fragment>
      <section id="why-us" className="why-us section">
        <div className="container">
          <div className="row g-0">
            <div className="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
              <img src={image} alt="" />
            </div>

            <div className="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">
              <div className="swiper init-swiper" id="init-swiper">
                <div className="swiper-wrapper">
                  <div className="swiper-slide">
                    <div className="item">
                      <h3 className="mb-3">Odaberite najbolje ponude za osiguranje, rešite štetu koju imate.</h3>
                      <h4 className="mb-3">Centar za osiguranje.</h4>
                      <p>
                        Profesionalno i odgovorno ćemo Vam pomoći oko odabira najbolje ponude za Vaše osiguranje, kao i ako imate štetu, tu smo za <b>Vas</b>.
                      </p>
                      <ul>
                        <li style={{ listStyle: `none` }}>
                          <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px`, transform: `translateY(50px)` }}></i>
                          Besplatan savet
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div className="swiper-slide">
                    <div className="item">
                      <h3 className="mb-3">Zašto je osiguranje potrebno?</h3>
                      <h4 className="mb-3">Centar za osiguranje.</h4>
                      <p>
                        Osiguranje je ključna zaštita za Vas, Vašu porodicu, imovinu i biznis. Kroz osiguranje upravljate rizicima, prenoseći potencijalne štete na osiguravajuću kuću u zamenu za
                        plaćanje premije. Ova finansijska sigurnost postaje posebno važna u neočekivanim situacijama kada šteta može biti značajna, bilo da je reč o ličnoj imovini ili poslovanju.
                        Osiguranje nije luksuz već nužnost, jer osigurava nadoknadu štete i vraća stvari u prvobitno stanje. Ne dozvolite da Vas iznenadi štetni događaj —{' '}
                        <b>osigurajte sebe i svoj biznis na vreme</b>.
                      </p>
                    </div>
                  </div>

                  <div className="swiper-slide">
                    <div className="item">
                      <h3 className="mb-3">Šta će se desiti ako nemate osiguranje?</h3>
                      <h4 className="mb-3">Centar za osiguranje</h4>
                      <p>
                        Biti neosiguran je velika kocka i može da donese velike posledice. Posledice prvenstveno Vama na štetu, a onda indirektno i Vašoj porodici. Moguće je da imate problem sa
                        zakonom-da platite kaznu, zbog nastale štete. Ali, ono što najgore može da Vam se desi, da sve to jako utiče na Vaše finansije, a najgori slučaj je kada utiče na vaše
                        najmilije, na Vašu porodicu. Vaša porodica postaje ranjiva, vaš biznis može da propadne zbog toga što nemate osiguranje. <b>Sve se ovo može preduprediti polisom osiguranja.</b>
                      </p>
                    </div>
                  </div>
                </div>
                <div className="swiper-pagination"></div>
              </div>

              <div className="swiper-button-prev"></div>
              <div className="swiper-button-next"></div>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Swiper;
