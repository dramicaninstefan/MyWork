import { useState, useRef, useEffect } from 'react';
import emailjs from '@emailjs/browser';
import { Link, useNavigate } from 'react-router-dom';

import classes from './Hero.module.css';

import bgImage from '../../../assets/img/hero-bg.jpg';

import click from '../../../assets/img/icon/click1.gif';

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
  const [select, setSelect] = useState('');
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
    <section id="hero" className={`${classes.hero} section dark-background`}>
      <img src={bgImage} className={classes.bgimage} alt="" data-aos="fade-in" />

      <div className={`${classes.container} container d-xl-flex flex-wrap`}>
        <div className="row col-xl-5 pr-0 pb-5 mt-5">
          <div className="col-xl-12">
            <h1 data-aos="fade-up">CENTAR ZA POLISE I ŠTETE</h1>
            <blockquote data-aos="fade-up" data-aos-delay="100">
              <p>
                Mi smo zastupnička agencija za osiguranje koja ima ugovor sa <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>svim osiguravajućim kućama</span> u Srbiji.
                <br />
                <br />
                Bavimo se <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>svim vrstama osiguranja</span>, kao i organizacijom
                <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}> naplate štete </span>iz osiguranja.
                <br />
                <br />
                Naša usluga je prema Vama u potpunosti <span style={{ textTransform: `uppercase`, fontWeight: `bold` }}>BESPLATNA</span> za polise i bez skrivenih troškova.
              </p>
            </blockquote>
            <div className="d-xl-flex" data-aos="fade-up" data-aos-delay="200">
              <button className={`${classes.btn} mt-4 mt-xl-0`} onClick={handleClickVideo}>
                <span>Ko smo mi?</span>
                <i className="fa-regular fa-circle-play"></i>
                <img src={click} alt="" className={classes.clickIcon} />
              </button>
            </div>
          </div>
        </div>

        <div className={`${classes['icon-box-wrapper']} row gy-4 col-xl-7 pr-0 justify-content-center pl-xl-5 pt-5`} data-aos="fade-up" data-aos-delay="200">
          <div className="section-title pb-0 pt-5">
            <h2>Od nas dobijate:</h2>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-file-circle-check pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>Preko 25 </b> ponuda <br /> za osiguranje, bez "sitnih slova"!
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-handshake pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>BESPLATNE PONUDE,</b> jer nas plaća osiguravajuća kuća kojoj donesemo posao.
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-magnifying-glass pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>UPOREDITE CENE</b> <br /> i dogovorite <b>polisu</b> osiguranja za sebe!
                </Link>
              </h3>
            </div>
          </div>
          <div className="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div className={classes['icon-box']}>
              <i className="fa-solid fa-comments-dollar pb-3"></i>
              <h3>
                <Link
                  onClick={(e) => {
                    e.preventDefault();
                    const y = document.getElementById('contact').offsetTop;
                    window.scrollTo({ top: y - 180, behavior: 'smooth' });
                  }}
                >
                  <b>NAPLATITE ŠTETU </b> <br /> od osiguranja - NAJBOLJA NAPLATA!
                </Link>
              </h3>
            </div>
          </div>
        </div>

        <div className={`${classes['form-wrapper']} row gy-4 col-xl-7 pr-0 justify-content-center pl-xl-5 mt-3`} data-aos="fade-up" data-aos-delay="200">
          <div className="col-lg-12 wow fadeIn" data-aos="fade-left" data-wow-delay="0.5s">
            <div className="bg-white rounded p-5">
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
                  <div className="col-sm-6">
                    <div>
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
                        value={select}
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
