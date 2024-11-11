import React, { Fragment } from 'react';

import classes from './ModalKasko.module.css';

import slika1 from '../../../assets/img/saobracajna.png';
import slika2 from '../../../assets/img/aopolisa.png';
import slika3 from '../../../assets/img/licna-karta.png';
import slika4 from '../../../assets/img/oglas.png';

const ModalKasko = ({ handleClick }) => {
  return (
    <Fragment>
      <div className={classes.wrapper}>
        <div
          className={classes.backdrop}
          onClick={(e) => {
            handleClick();
          }}
        ></div>
        <div className={classes.modal}>
          <div className={classes.container} data-aos="fade-down">
            <button
              id={classes.btn}
              className="btn btn-light"
              style={{ border: `1px solid black`, fontWeight: `bold` }}
              onClick={(e) => {
                handleClick();
              }}
            >
              X
            </button>
            <div className={classes.nav}>
              <h3>
                U sledećem tekstu objasnićemo ćemo Vam postupak izrade ponude, <br /> buduće polise za kasko osiguranje.
              </h3>
            </div>
            <div className={classes.list}>
              <p>
                Da bi Vam se spremila ponuda za kasko osiguranje na Vaš ime, sve osiguravajuće kuće traže sledeće podatke: <b>podatke o vozilu i podatke o vlasniku.</b>
                <br />
                <br />
                <b>Podaci o vozilu</b> su potrebni kako bi se odredila kataloška vrednost vozila, vrednost za pokriće u polisi za slučaj najgoreg, tj. za slučaj krađe ili totalne štete. Ova vrednost
                je najbitnija na polisi i to su obično podaci iz saobraćajne knjižice.
              </p>
              <img className="img-fluid my-4" src={slika1} alt="" />
              <p>
                <b>Podaci o vlasniku</b> su potrebni kako bi Vas osiguravajuća kuća proverila kao budućeg klijenta u svojoj bazi, i to obično radi preko Jedinstvenog matičnog broja-JMBGa ili PIBa.
                Proveravaju da li ste incidentni ili ne, tj. da li ste naplaćivali štetu ili niste. To su obično podaci iz lična karte ili APRa.
              </p>
              <img className="img-fluid my-4" src={slika2} alt="" />
              <p>
                Ova dva podatka inače postoje u <b>maloj polisi</b> za registraciju, polisi autoodgovornosti ako je vozilo na Vaše ime.
              </p>
              <img className="img-fluid my-4" src={slika3} alt="" />
              <p>
                Manjkavost podataka o vozilu u saobraćajnoj je to što tamo pišu samo Kilovati i Centimetri kubni, ne piše i koja je oprema u vozilu, a oprema uglavnom čini vrednost vozila.
                <br />
                Zato je pa i neophodno da imamo i <b>1 oglas</b> sa polovnih automobila, gde se vidi vozilo kao što je Vaše, tj vidi se koliko Vaše vozilo trenutno vredi na tržištu. Na kraju ćemo kod
                prihvata osiguranja sve to dokumentovati fotografijama Vašeg vozila, koje se šalju u osiguravajuću kuću (mi fotografišemo vozilo i šaljemo u osiguravajuću kuću).
              </p>
              <img className="img-fluid my-4" src={slika4} alt="" />
              <p>
                Na osnovu saobraćajne i oglasa možemo dobiti adekvatno pokriće za polisu, adekvatno pokriće za slučaj najgoreg, a to je krađa ili totalna šteta. Za delimičnu štetu, svaka polisa je
                dobra. A pošto se dešavaju i krađe i totalen štete, potrebno je ugovoriti pravo pokriće i za ove situacije. Zbog svega napred navedenog, neophodno je da imamo sva 3 podatka. Bez oglasa
                i možemo, ali bez prva dva nikako.
                <br />
                Ovi podaci se šalju u osiguravajuću kuću radi dobijanja ponuda, koje prezentujemo Vama.
                <br />
                <br />
                Ponude koje dobijemo su potpuno iste kao da ste išli direktno u osiguravajuću kuću, a neretko su i bolje, a Vi niste utrošili vreme za obilazak osiguravajućih kuća i drugo.
              </p>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default ModalKasko;
