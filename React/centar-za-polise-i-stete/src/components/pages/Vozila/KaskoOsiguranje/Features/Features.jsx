import React, { Fragment } from 'react';

import classes from './Features.model.css';

import kasko1 from '../../../../../assets/img/kasko1.jpg';

const Features = () => {
  return (
    <Fragment>
      <section id="about" className={`${classes.kasko} section`}>
        <div className="container">
          <div className="row gy-4">
            <div className={`${classes.content} col-lg-12 order-1 order-lg-1 `} data-aos="fade-up" data-aos-delay="200">
              <h3>Šta je kasko osiguranje vozila i da li vam je potrebno?</h3>
              <p className="">
                Obavezno osiguranje od autoodgovornosti nas štiti od posledica tuđih grešaka, ali šta je sa krađom, štetama na parkingu ili tokom vožnje kada krivca nema, ili smo to ponekad i mi sami?
                <br />
                <br />
                U takvim situacijama, kasko osiguranje pruža zaštitu od svih rizika koji mogu ugroziti vaše vozilo. Budući da osiguranje nije nešto što možete nabaviti nakon što se šteta dogodi, važno
                je razmišljati o njemu na vreme.
                <br />
                <br />
                Razlika između obaveznog osiguranja od autoodgovornosti i kasko osiguranja, koje spada u dobrovoljno osiguranje vozila, je značajna. Sa potpunom polisom kasko osiguranja, vaša vozila
                su zaštićena bez obzira na to ko je odgovoran za delimičnu štetu, totalnu štetu ili potpuni gubitak vozila (krađu).
                <br />
                <br />
                Najbolje kasko osiguranje je ono koje nudi idealan balans između cene i pokrića, prilagođeno vašem modelu vozila. Zbog toga je važno uporediti ponude različitih osiguravajućih kuća, a
                kod nas to možete uraditi jednostavno popunjavanjem kratkog upitnika sa osnovnim podacima o vozilu. Nakon poređenja ponuda i konsultacija sa našim stručnjacima, lako ćete doneti mudru
                odluku o izboru osiguranja i osigurati se od mnogobrojnih rizika.
              </p>
            </div>
          </div>
          <div className="row gy-4 pt-5" data-aos="fade-up">
            <div className={`${classes.content} col-lg-12 order-1 order-lg-2 `}>
              <h3>Šta pokriva kasko osiguranje vozila?</h3>
              <p className="">Kasko osiguranje predstavlja osiguranje vozila kao i njihove dodatne opreme (ukoliko se to posebno ugovori) od osiguranih opasnosti – rizika kao što su:</p>
              <ul style={{ listStyle: `none`, padding: `0` }}>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> saobraćajne nezgode
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> požar
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> grad, kiša, oluja
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> štete usled manifestacija i demontracija
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> krađa vozila
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `var(--accent-color)`, fontSize: `25px` }}></i> ostali rizici definisani u uslovima osiguranja
                </li>
              </ul>
              <p>
                Pokrivena su delimična oštećenja, kao i potpuno uništenje vozila prilkom kog dolazi do tzv. “totalne štete”.
                <br />
                <br />
                U skladu sa vašim potrebama i mogućnostima možete odabrati delimično ili full kasko, a uz to i dopunsko osiguranje za vaše vozilo.
                <br />
                <br />
                Za delimično kasko osiguranje uglavnom se odlučuju vlasnici starijih vozila, dok je potpuno i dopunsko osiguranje izbor vlasnika novijih vozila. Osim navedenih rizika, dopunsko
                osiguranje obuhvata i troškove vuče, posebnu opremu vozila, troškove iznajmljivanja zamenskog vozila i druge usluge definisane ugovorom.
              </p>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Features;
