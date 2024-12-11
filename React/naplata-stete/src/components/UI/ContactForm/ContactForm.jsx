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
  const [select, setSelect] = useState(defaultValue ? defaultValue : 'Naplata Štete');
  const [message, setMessage] = useState('');
  const [sajt, setSajt] = useState('Najbolja Naplata Štete');

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
                <a href=" tel:+381638489439" style={{ color: `#fff` }}>
                  <i className=" fa-solid fa-phone" style={{ fontSize: `25px`, marginRight: `10px`, transform: `translateY(-1px)` }}></i>Telefon
                </a>
              </h2>
              <a href="tel:+381638489439" style={{ color: `#fff`, fontSize: `22px` }} target="_blank" rel="noreferrer">
                +381 63 84 89 439
              </a>
              <h2 style={{ marginBlock: `20px` }}>
                <a href="mailto:office@najboljanaplatastete.rs	" style={{ color: `#fff` }}>
                  <i className="fa-solid fa-envelope" style={{ fontSize: `25px`, marginRight: `10px`, transform: `translateY(-1px)` }}></i>Email
                </a>
              </h2>
              <a href="mailto:office@najboljanaplatastete.rs	" style={{ color: `#fff`, fontSize: `22px` }} target="_blank" rel="noreferrer">
                office@najboljanaplatastete.rs
              </a>
            </div>
            <div className="col-lg-6 wow fadeIn" data-aos="fade-left" data-wow-delay="0.5s">
              <div className="bg-white rounded p-5">
                <form ref={form} className={classes.form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
                  <div className="row g-3">
                    <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="gname">
                          Ime <span className="text-danger">*</span>
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="gname"
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
                        <label htmlFor="cname">
                          Broj telefona <span className="text-danger">*</span>
                        </label>
                        <input
                          type="tel"
                          className="form-control"
                          id="cname"
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
                        <label htmlFor="gmail">
                          Email <span className="text-danger">(Opciono)</span>
                        </label>
                        <input
                          type="email"
                          className="form-control"
                          id="gmail"
                          onChange={(e) => {
                            setEmail(e.target.value);
                          }}
                          value={email}
                        />
                      </div>
                    </div>
                    {/* <div className="col-sm-6">
                      <div className="">
                        <label htmlFor="select">
                          Zainteresovan sam za: <span className="text-danger">*</span>
                        </label>
                        <select
                          className="form-control form-select"
                          name=""
                          id="select"
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
                    </div> */}
                    <div className="col-12">
                      <div className="">
                        <label htmlFor="message" style={{ textWrap: `wrap` }}>
                          Kako možemo da Vam pomognemo? <span className="text-danger">*</span>
                        </label>
                        <textarea
                          className="form-control"
                          id="message"
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
