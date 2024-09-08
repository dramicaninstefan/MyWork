import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './SteteForm.module.css';

import zemlje_list from '../../../../assets/arrays/zemlje_list';
import prebivaliste_list from '../../../../assets/arrays/prebivaliste_list';

const SteteForm = () => {
  // Get today date to disable future dates in date input
  var today = new Date().toISOString().split('T')[0];

  return (
    <Fragment>
      <div className={` container`} id="contact" data-aos="fade-up">
        <div className={`${classes['stete-form-wrapper']} rounded`}>
          <div className={`${classes['stete-form']}`}>
            <form className="row">
              <div className="col-12 section-title">
                <h2 style={{ fontWeight: `bold` }}>U cilju što detaljnije prijave štete i boljeg uvida u Vaš slučaj, popunite podatke u formi ispod.</h2>
                <h4>
                  Ukoliko imate pitanja ili vam je potreban savet, možete nas kontaktirati na broj
                  <br />
                  <a href="tel:+381608060001">+381 608060001</a>
                </h4>
              </div>
              <div className="col-12 rounded" style={{ backgroundColor: `#f1f1f1f1`, paddingBlock: `30px` }}>
                <div className="section-title pb-5">
                  <h3>
                    Kontakt podaci
                    <br />
                    {/* <small style={{ fontSize: `20px` }}>(potrebni su jer osiguravajuća kuća provera svakog klijenta u svojoj bazi, da li je naplaćivao štete ili ne)</small> */}
                  </h3>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputFirstLastName">
                      Ime i prezime <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputFirstLastName" required />
                  </div>
                  {/* <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputAddress">
                      Ulica i broj <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputAddress" required />
                  </div> */}
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPrebivaliste">
                      Opština prebivališta: <span>*</span>
                    </label>
                    <select className="form-control form-select" id="InputPrebivaliste" required>
                      <option value="">Izaberite</option>
                      {prebivaliste_list?.map((item) => {
                        return (
                          <option key={item.id} value={item.name}>
                            {item.name}
                          </option>
                        );
                      })}
                    </select>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputNumber">
                      Telefon <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputNumber" required />
                  </div>
                </div>
                <div className="row col-12">
                  {/* <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputJMBG">
                      JMBG <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputJMBG" required />
                  </div> */}
                  {/* <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputNumber">
                      Telefon <span>*</span>
                    </label>
                    <input type="text" className="form-control" id="InputNumber" required />
                  </div> */}
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputEmail">
                      Email <span>(opciono)</span>
                    </label>
                    <input type="email" className="form-control" id="InputEmail" aria-describedby="emailHelp" />
                  </div>
                </div>
              </div>

              <div className="col-12">
                <div className="section-title py-5">
                  <h3>
                    Podaci o nezgodi (nesreći)
                    <br />
                    {/* <small style={{ fontSize: `20px` }}>(potrebni su radi određivanja kataloške vrednosti vozila, zbog pokrića za slučaj štete)</small> */}
                  </h3>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputDate">
                      Datum nezgode: <span>*</span>
                    </label>
                    <input type="date" className="form-control" id="InputDate" max={today} required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <div className="d-flex">
                      <label htmlFor="InputCountry">
                        Država: <span>*</span>
                      </label>
                      <div className={classes['tooltip-container']}>
                        <div className={classes.icon}>
                          <i className="fa-solid fa-circle-info"></i>
                        </div>
                        <div className={classes.tooltip}>
                          <p>Izaberite zemlju u kojoj se desila nezgoda.</p>
                        </div>
                      </div>
                    </div>

                    <select className="form-control form-select" id="InputCountry" required>
                      <option value="">Izaberite</option>
                      {zemlje_list?.map((item) => {
                        return (
                          <option key={item.id} value={item.name}>
                            {item.name}
                          </option>
                        );
                      })}
                    </select>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <div className="d-flex">
                      <label htmlFor="InputAfter">
                        Posle nezgode: <span>*</span>
                      </label>

                      <div className={classes['tooltip-container']}>
                        <div className={classes.icon}>
                          <i className="fa-solid fa-circle-info"></i>
                        </div>
                        <div className={classes.tooltip}>
                          <p>Morate izabrati šta ste uradili posle nezgode</p>
                        </div>
                      </div>
                    </div>

                    <select className="form-control form-select" id="InputAfter" required>
                      <option value="">Izaberite</option>
                      <option value="MUP je izašao na lice mesta">MUP je izašao na lice mesta</option>
                      <option value="Popunjen je EU izveštaj">Popunjen je EU izveštaj</option>
                      <option value="Ništa od navedenog">Ništa od navedenog</option>
                    </select>
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputRadioNe">
                      Bilo je povređenih? <span>*</span>
                    </label>
                    <div className="form-check">
                      <input className="form-check-input" type="radio" name="flexRadioDefault" id="InputRadioDa" required />
                      <label className="form-check-label" htmlFor="InputRadioDa">
                        Da
                      </label>
                    </div>
                    <div className="form-check">
                      <input className="form-check-input" type="radio" name="flexRadioDefault" id="InputRadioNe" required />
                      <label className="form-check-label" htmlFor="InputRadioNe">
                        Ne
                      </label>
                    </div>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <div className="d-flex">
                      <label htmlFor="InputNezgode">
                        Mesto nezgode: <span>*</span>
                      </label>

                      <div className={classes['tooltip-container']}>
                        <div className={classes.icon}>
                          <i className="fa-solid fa-circle-info"></i>
                        </div>
                        <div className={classes.tooltip}>
                          <p>Upisati mesto u kome se nesreća desila - grad, opštinu...</p>
                        </div>
                      </div>
                    </div>

                    <textarea className="form-control" id="InputNezgode" rows="3" required></textarea>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <div className="d-flex">
                      <label htmlFor="InputNapomene">
                        Vaše napomene:
                        {/* <span>*</span> */}
                      </label>

                      <div className={classes['tooltip-container']}>
                        <div className={classes.icon}>
                          <i className="fa-solid fa-circle-info"></i>
                        </div>
                        <div className={classes.tooltip}>
                          <p>Ukoliko smatrate da postoji još neka bitna informacija napišite je. Unos nije obavezan.</p>
                        </div>
                      </div>
                    </div>
                    <textarea className="form-control" id="InputNapomene" rows="3"></textarea>
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
                <button type="submit" className={classes.bt} id="bt">
                  <span className={classes.msg} id="msg"></span>
                  Pošalji upit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default SteteForm;
