import { Fragment, useState, useRef, useEffect } from 'react';
import emailjs from '@emailjs/browser';
import { useLocation } from 'react-router-dom';
import { Link, useNavigate } from 'react-router-dom';

import classes from './KaskoFormPage.module.css';

const KaskoFormPage = () => {
  const location = useLocation();
  // eslint-disable-next-line react-hooks/exhaustive-deps
  const params = new URLSearchParams(location.search);

  const [saradnikGet, setSaradnikGet] = useState('');

  const navigate = useNavigate();
  const handleRedirectTo = () => {
    navigate('/hvala-vam');
  };

  const form = useRef();

  const [name, setName] = useState('');
  const [number, setNumber] = useState('');
  const [email, setEmail] = useState('');
  const [address, setAddress] = useState('');
  const [place, setPlace] = useState('');

  const [mark, setMark] = useState('');
  const [type, setType] = useState('');
  const [power, setPower] = useState('');
  const [zapremina, setZapremina] = useState('');
  const [year, setYear] = useState('');
  const [mValue, setMValue] = useState('');
  const [LinkPA, setLinkPA] = useState('');

  const [saglasan, setSaglasan] = useState(false);

  const [disabledInput, setDisabledInput] = useState(false);

  const templateParams = {
    user_name: name,
    user_number: number,
    user_email: email,
    user_address: address,
    user_place: place,

    car_marka: mark,
    car_tip: type,
    car_snaga: power,
    car_zapremina: zapremina,
    car_godina: year,
    car_vrednost: mValue,
    car_link: LinkPA,

    user_saglasan: saglasan ? 'JESAM' : 'NISAM',

    saradnik: saradnikGet,
  };

  useEffect(() => {
    const saradnik = params.get('saradnik');
    const marka = params.get('marka');
    const model = params.get('model');
    const godiste = params.get('godiste');
    const trzisnaVrednost = params.get('trzisna-vrednost');
    const cm3 = params.get('cm3');
    const kw = params.get('kW');
    const linkOglas = params.get('link');

    if (saradnik) {
      setSaradnikGet(saradnik);
    }
    if (marka) {
      setMark(marka);
      setDisabledInput(true);
    }
    if (model) {
      setType(model);
      setDisabledInput(true);
    }
    if (godiste) {
      setYear(godiste);
      setDisabledInput(true);
    }
    if (trzisnaVrednost) {
      setMValue(trzisnaVrednost);
      setDisabledInput(true);
    }
    if (cm3) {
      setZapremina(cm3);
      setDisabledInput(true);
    }
    if (kw) {
      setPower(kw);
      setDisabledInput(true);
    }
    if (linkOglas) {
      setLinkPA(linkOglas);
      setDisabledInput(true);
    }
  }, [params]);

  console.log({
    saradnikGet,
    mark,
    type,
    power,
    zapremina,
    year,
    mValue,
    LinkPA,
  });

  const [showAlert, setShowAlert] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();

    const formValid = form.current.checkValidity();
    form.current.classList.add('was-validated');

    if (!formValid) {
      console.log('invalid');
      setShowAlert(true); // Prikazujemo alert
      return;
    }

    console.log('valid');
    setShowAlert(false); // Sakrivamo alert ako je forma validna

    sendEmail();
  };

  function sendEmail() {
    // 1. Pozovi tvoj API da doda klijenta u bazu
    fetch('https://czpis.in.rs/api/add_client_api.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        ime_prezime: name,
        kontakt: number,
        email: email,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        console.log('API odgovor:', data);

        // 2. Nakon uspešnog API poziva, šalji email
        emailjs
          .send('service_90anb7y', 'template_9yiiwdf', templateParams, {
            publicKey: '_TykGN5dKmnTuxu5y',
          })
          .then(
            (response) => {
              handleRedirectTo();
              setName('');
              setNumber('');
              setEmail('');
              setAddress('');
              setPlace('');
              setLinkPA('');

              setMark('');
              setType('');
              setPower('');
              setZapremina('');
              setYear('');
              setMValue('');

              setSaglasan(false);
            },
            (err) => {}
          );
      })
      .catch((err) => {
        console.error('Greška pri slanju podataka na server:', err);
      });
  }

  return (
    <Fragment>
      <div className={`container my-5`} id="contact" data-aos="fade-up">
        <div className={`${classes['kasko-form-wrapper']} rounded`}>
          <div className={`${classes['kasko-form']}`}>
            <form className="row needs-validation" ref={form} onSubmit={handleSubmit} noValidate>
              {/* <div className="col-12 section-title">
                    <h2 style={{ fontWeight: `bold` }}>
                      Za dobijanje kasko ponuda direktno od osiguravajućih kuća <br /> (bez sitnih slova), molimo Vas da popunite formu u nastavku, a mi ćemo Vas kontaktirati u najkraćem roku.
                    </h2>
                    <h4>
                      Ukoliko imate pitanja ili Vam je potreban savet, možete nas kontaktirati na broj
                      <br />
                      <a href="tel:+381608060001">+381 60 80 60 001</a>
                    </h4>
                  </div> */}
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
                    <div className="invalid-feedback">Molimo Vas unesite ime i prezime.</div>
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
                    <div className="invalid-feedback">Molimo Vas unesite adresu.</div>
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
                    <div className="invalid-feedback">Molimo Vas unesite mesto.</div>
                  </div>
                </div>
                <div className="row col-12">
                  {/* <div className="form-group col-xl-4 col-md-12">
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
                    <div className="invalid-feedback">Molimo Vas unesite JMBG.</div>
                  </div> */}
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
                      pattern="\d{5,10}"
                      title="Broj mora imati između 5 i 10 cifara."
                      required
                    />
                    <div className="invalid-feedback">Unesite validan broj telefona (5 do 10 cifara).</div>
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
                    <div className="invalid-feedback">Molimo Vas unesite validan email.</div>
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
                    <input type="text" className="form-control" id="InputMark" onChange={(e) => setMark(e.target.value)} value={mark} disabled={disabledInput} required={!disabledInput} />
                    <div className="invalid-feedback">Molimo Vas unesite marku vozila.</div>
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
                      disabled={disabledInput}
                      required={!disabledInput}
                    />
                    <div className="invalid-feedback">Molimo Vas unesite tip vozila.</div>
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
                      disabled={disabledInput}
                      required={!disabledInput}
                    />
                    <div className="invalid-feedback">Molimo Vas unesite snagu motora.</div>
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
                      disabled={disabledInput}
                      required={!disabledInput}
                    />
                    <div className="invalid-feedback">Molimo Vas unesite zapreminu motora.</div>
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
                      disabled={disabledInput}
                      required={!disabledInput}
                    />
                    <div className="invalid-feedback">Molimo Vas unesite godinu proizvodnje vozila.</div>
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
                      disabled={disabledInput}
                      required={!disabledInput}
                    />
                    <div className="invalid-feedback">Molimo Vas unesite tržišnu vrednost vozila.</div>
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
                      disabled={disabledInput}
                    />
                  </div>
                </div>

                <div className="col-12 py-5">
                  <div className="form-group form-check">
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

              {showAlert && (
                <div className="alert alert-danger" role="alert">
                  Molimo popunite sva obavezna polja.
                </div>
              )}

              <div className="col-12 ">
                <button className={`${classes.bt} col-xl-2 col-md-12`} id="bt">
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

export default KaskoFormPage;
