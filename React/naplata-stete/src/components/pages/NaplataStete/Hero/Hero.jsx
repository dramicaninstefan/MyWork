import { useState, useRef, useEffect } from 'react';
import emailjs from '@emailjs/browser';
import { useNavigate } from 'react-router-dom';

import classes from './Hero.module.css';

import bgImage from '../../../../assets/img/stete-hero-bg.jpg';

const Hero = ({ handleClickVideo, handleClickThankYou }) => {
  // redirect to /hvala-vam page
  const navigate = useNavigate();
  const handleRedirectTo = () => {
    navigate('/hvala-vam');
  };

  const [screenWidth, setScreenWidth] = useState(window.innerWidth);
  const [hideContactForm, setHideContactForm] = useState(false);

  const submitBtn = useRef();
  const form = useRef();

  const [successMsg, setSuccessMsg] = useState(false);
  const [errorMsg, setErrorMsg] = useState(false);
  const [alertMsg, setAlertMsg] = useState(false);
  const [alertPhoneMsg, setAlertPhoneMsg] = useState(false);

  const [name, setName] = useState('');
  const [number, setNumber] = useState('');
  const [email, setEmail] = useState('');
  const [select, setSelect] = useState('Naplata Štete');
  const [message, setMessage] = useState('');

  const templateParams = {
    user_name: name,
    user_number: number,
    user_email: email,
    user_option: select,
    message: message,
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
              // handleClickThankYou();
              setSuccessMsg(true);
              setName('');
              setNumber('');
              setEmail('');
              setSelect('');
              setMessage('');

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

  // changes id for from from contact to empty id
  useEffect(() => {
    // Function to update the screen width
    const handleResize = () => {
      setScreenWidth(window.innerWidth);
    };

    // Add event listener to update width on window resize
    window.addEventListener('resize', handleResize);

    // Clean up event listener on component unmount
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, []);

  useEffect(() => {
    screenWidth < 1200 ? setHideContactForm(true) : setHideContactForm(false);
  }, [screenWidth]);

  return (
    <section id="hero" class="hero section light-background" style={{ background: `url('${bgImage}') top left` }}>
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1 className="text-light">Najbolja NAPLATA ŠTETE od osiguranja!</h1>
            <div className="mt-3">
              <ul style={{ listStyle: `none`, marginTop: `30px`, borderLeft: `2px solid #fff` }}>
                <li>
                  <h3>Benefiti</h3>
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Najbolja naplata štete
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Bolja naplata nego da idete sami
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Ušteda vremena za naplatu
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Maksimalni iznosi naplate štete
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Brzo i efikasno vodimo ceo postupak
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Stručni tim (advokati, sudski veštaci…)
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Bez Vašeg troška u postupku
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>24/7 dostupnost
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Dolazak na teren
                </li>
                <li>
                  <i className="bi bi-check" style={{ color: `#fff`, fontSize: `25px` }}></i>Moguća online naplata
                </li>
              </ul>
              {/* <a href="#about" class="btn-get-started">
                Get Started
              </a> */}
            </div>
          </div>

          <div className={`${classes['form-wrapper']} col-lg-6 justify-content-center align-items-center`}>
            <div className="rounded" style={{ width: `90%`, height: `90%`, backgroundColor: `#fff`, padding: `20px` }}>
              <form ref={form} className={classes.form} id={hideContactForm ? '' : 'contact'} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
                <div className="row g-3">
                  <h2 style={{ color: `#254160`, fontStyle: `italic` }}>Pošaljite upit za konsultaciju</h2>

                  <div className="col-sm-6">
                    <div>
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
                    <div>
                      <label htmlFor="cname">
                        Broj telefona <span className="text-danger">*</span>
                      </label>
                      <input
                        type="text"
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
                    <div>
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

                  <div className="col-12">
                    <div>
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
    </section>
  );
};

export default Hero;
