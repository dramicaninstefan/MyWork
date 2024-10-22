import { Fragment, useState, useRef } from 'react';
import emailjs from '@emailjs/browser';
import { Link, useNavigate } from 'react-router-dom';

import classes from './KaskoFormPage.module.css';

const KaskoFormPage = () => {
  // redirect to /hvala-vam page
  const navigate = useNavigate();
  const handleRedirectTo = () => {
    navigate('/hvala-vam');
  };

  const submitBtn = useRef();
  const form = useRef();

  const [successMsg, setSuccessMsg] = useState(false);
  const [errorMsg, setErrorMsg] = useState(false);
  const [alertMsg, setAlertMsg] = useState(false);
  const [alertPhoneMsg, setAlertPhoneMsg] = useState(false);
  const [alertSaglasanMsg, setAlertSaglasanMsg] = useState(false);
  const [alertJMBGMsg, setAlertJMBGMsg] = useState(false);

  const [name, setName] = useState('');
  const [number, setNumber] = useState('');
  const [email, setEmail] = useState('');
  const [address, setAddress] = useState('');
  const [place, setPlace] = useState('');
  const [JMBG, setJMBG] = useState('');

  const [mark, setMark] = useState('');
  const [type, setType] = useState('');
  const [power, setPower] = useState('');
  const [zapremina, setZapremina] = useState('');
  const [year, setYear] = useState('');
  const [mValue, setMValue] = useState('');
  const [LinkPA, setLinkPA] = useState('');

  const [saglasan, setSaglasan] = useState(false);

  const templateParams = {
    user_name: name,
    user_number: number,
    user_email: email,
    user_address: address,
    user_place: place,
    user_JMBG: JMBG,

    car_marka: mark,
    car_tip: type,
    car_snaga: power,
    car_zapremina: zapremina,
    car_godina: year,
    car_vrednost: mValue,
    car_link: LinkPA,

    user_saglasan: saglasan ? 'JESAM' : 'NISAM',
  };

  function sendEmail(e) {
    e.preventDefault();

    var regex = /[^0-9]/g;

    if (name !== '' && number !== '' && address !== '' && place !== '' && mark !== '' && type !== '' && power !== '' && zapremina !== '' && year !== '' && mValue !== '' && JMBG !== '') {
      if (!regex.test(number)) {
        if (JMBG.length === 13) {
          if (saglasan) {
            emailjs
              .send('service_90anb7y', 'template_9yiiwdf', templateParams, {
                publicKey: '_TykGN5dKmnTuxu5y',
              })
              .then(
                (response) => {
                  handleRedirectTo();
                  setSuccessMsg(true);
                  setName('');
                  setNumber('');
                  setEmail('');
                  setAddress('');
                  setPlace('');
                  setLinkPA('');
                  setJMBG('');

                  setMark('');
                  setType('');
                  setPower('');
                  setZapremina('');
                  setYear('');
                  setMValue('');

                  setSaglasan(false);

                  setTimeout(() => {
                    setSuccessMsg(false);
                  }, 3000);
                },
                (err) => {
                  setErrorMsg(true);
                }
              );
          } else {
            setAlertSaglasanMsg(true);

            setTimeout(() => {
              setAlertSaglasanMsg(false);
            }, 3000);
          }
        } else {
          setAlertJMBGMsg(true);

          setTimeout(() => {
            setAlertJMBGMsg(false);
          }, 3000);
        }
      } else {
        setAlertPhoneMsg(true);

        setTimeout(() => {
          setAlertPhoneMsg(false);
        }, 3000);
      }
    } else {
      setAlertMsg(true);

      setTimeout(() => {
        setAlertMsg(false);
      }, 3000);
    }
  }

  return (
    <Fragment>
      <div className={`container my-5`} id="contact" data-aos="fade-up">
        <div className={`${classes['kasko-form-wrapper']} rounded`}>
          <div className={`${classes['kasko-form']}`}>
            <form className="row" ref={form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
              <div className="col-12 section-title">
                <h2 style={{ fontWeight: `bold` }}>
                  Za dobijanje kasko ponuda direktno od osiguravajućih kuća <br /> (bez sitnih slova), molimo vas da popunite formu u nastavku, a mi ćemo Vas kontaktirati u najkraćem roku.
                </h2>
                <h4>
                  Ukoliko imate pitanja ili Vam je potreban savet, možete nas kontaktirati na broj
                  <br />
                  <a href="tel:+381608060001">+381 60 80 60 001</a>
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
                    <input
                      type="text"
                      className="form-control"
                      id="InputFirstLastName"
                      onChange={(e) => {
                        setName(e.target.value);
                      }}
                      value={name}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputAddress">
                      Ulica i broj <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputAddress"
                      onChange={(e) => {
                        setAddress(e.target.value);
                      }}
                      value={address}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputCity">
                      Mesto <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputCity"
                      onChange={(e) => {
                        setPlace(e.target.value);
                      }}
                      value={place}
                      required
                    />
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputJMBG">
                      JMBG <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputJMBG"
                      onChange={(e) => {
                        setJMBG(e.target.value);
                      }}
                      value={JMBG}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputNumber">
                      Telefon <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputNumber"
                      onChange={(e) => {
                        setNumber(e.target.value);
                      }}
                      value={number}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputEmail1">
                      Email <span>(opciono)</span>
                    </label>
                    <input
                      type="email"
                      className="form-control"
                      id="InputEmail1"
                      aria-describedby="emailHelp"
                      onChange={(e) => {
                        setEmail(e.target.value);
                      }}
                      value={email}
                    />
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
                    <input
                      type="text"
                      className="form-control"
                      id="InputMark"
                      onChange={(e) => {
                        setMark(e.target.value);
                      }}
                      value={mark}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputType">
                      Tip vozila <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputType"
                      onChange={(e) => {
                        setType(e.target.value);
                      }}
                      value={type}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPower">
                      Snaga motora (kW) <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputPower"
                      onChange={(e) => {
                        setPower(e.target.value);
                      }}
                      value={power}
                      required
                    />
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputZapremina">
                      Zapremina motora (cm3) <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputZapremina"
                      onChange={(e) => {
                        setZapremina(e.target.value);
                      }}
                      value={zapremina}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputYear">
                      Godina proizvodnje vozila <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputYear"
                      onChange={(e) => {
                        setYear(e.target.value);
                      }}
                      value={year}
                      required
                    />
                  </div>
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPayment">
                      Tržišna vrednost (€) <span>*</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputPayment"
                      onChange={(e) => {
                        setMValue(e.target.value);
                      }}
                      value={mValue}
                      required
                    />
                  </div>
                </div>
                <div className="row col-12">
                  <div className="form-group col-xl-4 col-md-12">
                    <label htmlFor="InputPayment">
                      Link sa oglasa (npr. Polovni Automovili) <span>(opciono)</span>
                    </label>
                    <input
                      type="text"
                      className="form-control"
                      id="InputPayment"
                      onChange={(e) => {
                        setLinkPA(e.target.value);
                      }}
                      value={LinkPA}
                    />
                  </div>
                </div>

                <div className="col-12 py-5">
                  <div className="form-group form-check ">
                    <input
                      type="checkbox"
                      style={{ width: '20px', height: `20px`, border: `2px solid var(--accent-color)`, cursor: `pointer` }}
                      className="form-check-input"
                      id="InputSaglasan"
                      onChange={(e) => {
                        setSaglasan(true);
                      }}
                      checked={saglasan}
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
                <button ref={submitBtn} onClick={sendEmail} className={`${classes.bt} col-xl-2 col-md-12`} id="bt">
                  <span className={classes.msg} id="msg"></span>
                  Pošalji zahtev
                </button>
              </div>
              {successMsg ? <div className={classes.success}>Uspesno ste poslali podatke!</div> : null}
              {errorMsg ? <div className={classes.error}>Došlo je do greške!</div> : null}
              {alertMsg ? <div className={classes.alert}>Molim Vas popunite obavezna polja! *</div> : null}
              {alertPhoneMsg ? <div className={classes.alert}>Molim Vas unesite ispravan broj telefona!</div> : null}
              {alertJMBGMsg ? <div className={classes.alert}>JMBG mora imati 13 cifara.</div> : null}
              {alertSaglasanMsg ? <div className={classes.alert}>Molimo Vas da potvrdite Vašu saglasnost.</div> : null}
            </form>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default KaskoFormPage;