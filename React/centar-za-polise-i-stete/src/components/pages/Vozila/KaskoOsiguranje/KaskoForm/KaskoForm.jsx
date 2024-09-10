import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './KaskoForm.module.css';

const KaskoForm = () => {
  return (
    <Fragment>
      <div className={` container`} id="contact" data-aos="fade-up">
        <div className={`${classes['kasko-form-wrapper']} rounded`}>
          <div className={`${classes['kasko-form']}`}>
            <form className="row">
              <div className="col-12 section-title">
                <h2 style={{ fontWeight: `bold` }}>
                  Za dobijanje kasko ponuda direktno od osiguravajućih kuća <br /> (bez sitnih slova), molimo vas da popunite formu u nastavku, a mi ćemo Vas kontaktirati u najkraćem roku.
                </h2>
                <h4>
                  Ukoliko imate pitanja ili Vam je potreban savet, možete nas kontaktirati na broj
                  <br />
                  <a href="tel:+381608060001">+381 608060001</a>
                </h4>
              </div>
              <div className="col-12 rounded" style={{ backgroundColor: `#f1f1f1f1`, paddingBlock: `30px` }}>
                <div className="section-title pb-5">
                  <h3>
                    Podaci o vlasniku
                    <br />
                    <small style={{ fontSize: `20px` }}>(potrebni su jer osiguravajuća kuća provera svakog klijenta u svojoj bazi, da li je naplaćivao štete ili ne)</small>
                  </h3>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputFirstLastName">
                      Ime i prezime <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputFirstLastName" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputAddress">
                      Ulica i broj <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputAddress" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputCity">
                      Mesto <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputCity" required />
                  </div>
                </div>
                <div className="row col-12">
                  {/* <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputJMBG">
                      JMBG <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputJMBG" required />
                  </div> */}
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputNumber">
                      Telefon <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputNumber" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputEmail1">
                      Email <span>(opciono)</span>
                    </label>
                    <input type="email" className="form-control" id="InputEmail1" aria-describedby="emailHelp" />
                  </div>
                </div>
              </div>

              <div className="col-12">
                <div className="section-title py-5">
                  <h3>
                    Podaci o vozilu
                    <br />
                    <small style={{ fontSize: `20px` }}>(potrebni su radi određivanja kataloške vrednosti vozila, zbog pokrića za slučaj štete)</small>
                  </h3>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputMark">
                      Marka vozila <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputMark" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputType">
                      Tip vozila <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputType" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPower">
                      Snaga motora (kW) <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputPower" required />
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputZapremina">
                      Zapremina motora (cm3) <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputZapremina" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputYear">
                      Godina proizvodnje vozila <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputYear" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPayment">
                      Tržišna vrednost (€) <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputPayment" required />
                  </div>
                </div>
                <div className="col-12 py-5">
                  <div className="form-group form-check ">
                    <input
                      type="checkbox"
                      style={{ width: '20px', height: `20px`, border: `2px solid var(--accent-color)`, cursor: `pointer` }}
                      className="form-check-input"
                      id="InputSaglasan"
                      required
                    />
                    <label className="form-check-label ml-2" htmlFor="InputSaglasan">
                      Saglasan/-na sam da Centar za polise i štete sa mnom kontaktira, šalje mi korisne informacije, ponude i obaveštenja o proizvodima i uslugama osiguranja.
                      <Link to="/politika-privatnosti"> Politici privatnosti.</Link>
                    </label>
                  </div>
                </div>
              </div>

              <div className="col-12 ">
                <button type="submit" className={`${classes.bt} col-xl-2 col-md-12`} id="bt">
                  <span className={classes.msg} id="msg"></span>
                  Pošalji zahtev
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default KaskoForm;
