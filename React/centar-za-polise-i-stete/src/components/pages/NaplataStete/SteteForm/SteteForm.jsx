import { Fragment } from 'react';
import { Link } from 'react-router-dom';

import classes from './SteteForm.module.css';

import country_list from '../../../../assets/arrays/country_list';

const SteteForm = () => {
  return (
    <Fragment>
      <div className={` container`} id="contact">
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
                    <input type="text" className="form-control" id="InputPrebivaliste" required />
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
                    <input type="date" className="form-control" id="InputDate" required />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputCountry">
                      Država: <span>*</span>
                    </label>
                    <select className="form-control" id="InputCountry" required>
                      <option value="">Izaberite zemlju u kojoj se desila nezgoda.</option>
                      {country_list?.map((item) => {
                        return <option value={item.name}>{item.name}</option>;
                      })}
                    </select>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputAfter">
                      Posle nezgode: <span>*</span>
                    </label>
                    <select className="form-control" id="InputAfter" required>
                      <option value="">Morate izabrati šta ste uradili posle nezgode</option>
                      <option value="MUP je izašao na lice mesta">MUP je izašao na lice mesta</option>
                      <option value="Popunjen je EU izveštaj">Popunjen je EU izveštaj</option>
                      <option value="Ništa od navedenog">Ništa od navedenog</option>
                    </select>
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputZapremina">
                      Bilo je povređenih? <span>*</span>
                    </label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="InputRadioDa" required />
                      <label class="form-check-label" for="InputRadioDa">
                        Da
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="InputRadioNe" required />
                      <label class="form-check-label" for="InputRadioNe">
                        Ne
                      </label>
                    </div>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPower">
                      Mesto nezgode: <span>*</span>
                    </label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Upisati mesto u kome se nesreća desila - grad, opštinu..." required></textarea>
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPower">
                      Vaše napomene:
                      {/* <span>*</span> */}
                    </label>
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                      placeholder="Ukoliko smatrate da postoji još neka bitna informacija napišite je. Unos nije obavezan."
                    ></textarea>
                  </div>
                </div>
                <div className="col-12 py-5">
                  <div className="form-group form-check ">
                    <input type="checkbox" style={{ width: '20px', height: `20px`, border: `2px solid var(--accent-color)` }} className="form-check-input" id="InputSaglasan" required />
                    <label className="form-check-label ml-2" htmlFor="InputSaglasan">
                      Saglasan/-na sam da Centar za polise i štete sa mnom kontaktira, šalje mi korisne informacije, ponude i obaveštenja o proizvodima i uslugama osiguranja.
                      <Link to="/politika-privatnosti"> Politici privatnosti.</Link>
                    </label>
                  </div>
                </div>
              </div>

              <div className="col-12 ">
                <button type="submit" className="btn btn-primary col-xl-2 col-md-12">
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

export default SteteForm;
