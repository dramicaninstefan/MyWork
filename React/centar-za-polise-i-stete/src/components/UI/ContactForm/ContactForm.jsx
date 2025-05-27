import React, { Fragment, useState, useRef, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import emailjs from '@emailjs/browser';
import ReactGA from 'react-ga4';

import classes from './ContactForm.module.css';

const ContactForm = ({ defaultValue }) => {
  useEffect(() => {
    ReactGA.initialize('G-2GSEYZZHQ8');
  }, []);

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

  const [name, setName] = useState('');
  const [number, setNumber] = useState('');
  const [email, setEmail] = useState('');
  const [select, setSelect] = useState(defaultValue ? defaultValue : '');
  const [message, setMessage] = useState('');
  const [sajt, setSajt] = useState('Centar Za Polise i Štete');

  const templateParams = {
    user_name: name,
    user_number: number,
    user_email: email,
    user_option: select,
    message: message,
    sajt: sajt,
  };

  function sendEmail(e) {
    e.preventDefault();

    var regex = /[^0-9]/g;

    if (name !== '' && number !== '' && select !== '' && message !== '') {
      if (!regex.test(number)) {
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
              .send('service_0ee562d', 'template_l23rpm9', templateParams, {
                publicKey: '_TykGN5dKmnTuxu5y',
              })
              .then(
                (response) => {
                  handleRedirectTo();
                  setSuccessMsg(true);
                  setName('');
                  setNumber('');
                  setEmail('');
                  setSelect('');
                  setMessage('');

                  // run gtag for Google Analitics
                  window.gtag('event', 'conversion', {
                    send_to: 'AW-11101931880/tV6vCODjptcZEOiS6K0p',
                  });

                  setTimeout(() => {
                    setSuccessMsg(false);
                  }, 3000);
                },
                (err) => {
                  setErrorMsg(true);
                }
              );
          })
          .catch((err) => {
            console.error('Greška pri slanju podataka na server:', err);
          });
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
      <div className={`container-fluid ${classes.contact} my-5 py-5 wow fadeIn`} data-wow-delay="0.1s" id="contact">
        <div className="container py-5">
          <div className="row g-5">
            <div className="col-lg-6 wow fadeIn" data-aos="fade-right">
              <h1 style={{ fontWeight: `bold` }} className="display-6 text-white mb-5">
                Vaš lični konsultant
              </h1>
              <h2 style={{ marginBlock: `20px` }}>
                <a href=" tel:+381608060001" style={{ color: `#fff` }}>
                  <i className=" fa-solid fa-phone" style={{ fontSize: `25px`, marginRight: `10px`, transform: `translateY(-1px)`, color: `var(--accent-color)` }}></i>Telefon
                </a>
              </h2>
              <a href="tel:+381608060001" style={{ color: `#fff`, fontSize: `22px` }} target="_blank" rel="noreferrer">
                +381 60 80 60 001
              </a>
              <h2 style={{ marginBlock: `20px` }}>
                <a href="mailto: svezaosiguranje@gmail.com" style={{ color: `#fff` }}>
                  <i className="fa-solid fa-envelope" style={{ fontSize: `25px`, marginRight: `10px`, transform: `translateY(-1px)`, color: `var(--accent-color)` }}></i>Email
                </a>
              </h2>
              <a href="mailto: svezaosiguranje@gmail.com" style={{ color: `#fff`, fontSize: `22px` }} target="_blank" rel="noreferrer">
                office@centarzapoliseistete.rs
              </a>
            </div>
            <div className="col-lg-6 wow fadeIn" data-aos="fade-left" data-wow-delay="0.5s">
              <div className="bg-white rounded p-5">
                <form ref={form} className={classes.form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
                  <div className="row g-3">
                    <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="gnames">
                          Ime <span className="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="gnames"
                          onChange={(e) => {
                            setName(e.target.value);
                          }}
                          value={name}
                          required
                        />
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="cnames">
                          Broj telefona <span className="text-danger">*</span>
                        </label>
                        <input
                          type="tel"
                          className="form-control"
                          id="cnames"
                          onChange={(e) => {
                            setNumber(e.target.value);
                          }}
                          value={number}
                          required
                        />
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="gmails">
                          Email <span className="text-danger">(Opciono)</span>
                        </label>
                        <input
                          type="email"
                          className="form-control"
                          id="gmails"
                          onChange={(e) => {
                            setEmail(e.target.value);
                          }}
                          value={email}
                        />
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="selects">
                          Zainteresovan sam za: <span className="text-danger">*</span>
                        </label>
                        <select
                          className="form-control form-select"
                          name=""
                          id="selects"
                          onChange={(e) => {
                            setSelect(e.target.value);
                          }}
                          value={select ? select : defaultValue}
                          required
                        >
                          <option value=""></option>
                          <option value="Kasko osiguranje">Kasko osiguranje</option>
                          <option value="Naplata štete">Naplata štete</option>
                          <option value="Životno Osiguranje">Životno Osiguranje</option>
                          <option value="Putno osiguranje">Putno osiguranje</option>
                          <option value="Osiguranje imovine">Osiguranje imovine</option>
                          <option value="Dobrovoljno Zdravstveno Osiguranje">Dobrovoljno Zdravstveno Osiguranje</option>
                          <option value="Osiguranje od nezgode">Osiguranje od nezgode</option>
                          <option value="Osiguranje od odgovornosti">Osiguranje od odgovornosti</option>
                          <option value="Ostalo">Ostalo</option>
                        </select>
                      </div>
                    </div>
                    <div className="col-12">
                      <div className="">
                        <label htmlFor="messages" style={{ textWrap: `wrap` }}>
                          Kako možemo da Vam pomognemo? <span className="text-danger">*</span>
                        </label>
                        <textarea
                          className="form-control"
                          id="messages"
                          style={{ height: `100px` }}
                          onChange={(e) => {
                            setMessage(e.target.value);
                          }}
                          value={message}
                        ></textarea>
                      </div>
                    </div>
                    <div className="col-12">
                      <button ref={submitBtn} onClick={sendEmail} className={classes.bt} id="bt">
                        <span className={classes.msg} id="msg"></span>
                        Pošalji upit
                      </button>
                    </div>

                    {successMsg ? <div className={classes.success}>Uspesno ste poslali podatke!</div> : null}
                    {errorMsg ? <div className={classes.error}>Došlo je do greške!</div> : null}
                    {alertMsg ? <div className={classes.alert}>Molim Vas popunite obavezna polja! *</div> : null}
                    {alertPhoneMsg ? <div className={classes.alert}>Molim Vas unesite ispravan broj telefona!</div> : null}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

export default ContactForm;
