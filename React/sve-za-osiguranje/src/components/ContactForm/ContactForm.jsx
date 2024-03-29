import { Fragment, useState, useRef } from 'react';
import emailjs from '@emailjs/browser';

import classes from './ContactForm.module.css';

const ContactForm = () => {
  const submitBtn = useRef();
  const form = useRef();

  const [successMsg, setSuccessMsg] = useState(false);
  const [errorMsg, setErrorMsg] = useState(false);
  const [alertMsg, setAlertMsg] = useState(false);

  const [name, setName] = useState('');
  const [number, setNumber] = useState('');
  const [email, setEmail] = useState('');
  const [select, setSelect] = useState('');
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

    if (name !== '' && number !== '' && select !== '' && message !== '') {
      emailjs
        .send('service_0ee562d', 'template_l23rpm9', templateParams, {
          publicKey: '_TykGN5dKmnTuxu5y',
        })
        .then(
          (response) => {
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
      setAlertMsg(true);

      setTimeout(() => {
        setAlertMsg(false);
      }, 3000);
    }
  }

  return (
    <Fragment>
      <div className={classes['contact-form']}>
        <div className={classes.content}>
          <div className={classes.info}>
            <h1 className={classes.title}>
              Vaš lični <br /> konsultant
            </h1>
            <h2 className={classes.link}>
              <a href="tel:+381608060001">
                <i className="fa-solid fa-phone"></i>Telefon
              </a>
            </h2>
            <a href="tel:+381608060001" target="_blank" rel="noreferrer" className={classes.adress}>
              +381 608060001
            </a>
            <h2 className={classes.link}>
              <a href="mailto: svezaosiguranje@gmail.com">
                <i className="fa-solid fa-envelope"></i>Email
              </a>
            </h2>
            <a href="mailto: svezaosiguranje@gmail.com" className={classes.email}>
              svezaosiguranje@gmail.com
            </a>
          </div>
          <form ref={form} className={classes.form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
            <div className={classes['form-client-data']}>
              <div className={classes.inputs}>
                <label htmlFor="firstName">Ime *</label>
                <input
                  type="text"
                  id="firstName"
                  placeholder="Ime*"
                  onChange={(e) => {
                    setName(e.target.value);
                  }}
                  value={name}
                  required
                />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="number">Telefon *</label>
                <input
                  type="text"
                  id="number"
                  placeholder="(123)-456-7890*"
                  onChange={(e) => {
                    setNumber(e.target.value);
                  }}
                  value={number}
                  required
                />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="email">Email (Opciono)</label>
                <input
                  type="text"
                  id="email"
                  placeholder="ime@gmail.com"
                  onChange={(e) => {
                    setEmail(e.target.value);
                  }}
                  value={email}
                />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="type">Zainteresovan sam za *</label>
                <select
                  name=""
                  id="type"
                  onChange={(e) => {
                    setSelect(e.target.value);
                  }}
                  value={select}
                >
                  <option value={''}>Izaberi:</option>
                  <option value="Kasko osiguranje">Kasko osiguranje</option>
                  <option value="Naplata štete">Naplata štete</option>
                  <option value="Životno Osiguranje">Životno Osiguranje</option>
                  <option value="Putno osiguranje">Putno osiguranje</option>
                  <option value="Osiguranje imovine">Osiguranje imovine</option>
                  <option value="Dobrovoljno Zdravstveno Osiguranje">Dobrovoljno Zdravstveno Osiguranje</option>
                  <option value="Osiguranje od nezgode">Osiguranje od nezgode</option>
                  <option value="Osiguranje od odgovornosti">Osiguranje od odgovornosti</option>
                </select>
              </div>
              <div className={classes.inputs}>
                <label htmlFor="message">Kako možemo da Vam pomognemo? *</label>
                <textarea
                  name="message"
                  id="message"
                  placeholder="Treba mi pomoc oko..."
                  required
                  onChange={(e) => {
                    setMessage(e.target.value);
                  }}
                  value={message}
                ></textarea>
              </div>
              <button ref={submitBtn} className={classes.btn} onClick={sendEmail}>
                Pošaljite upit
              </button>

              {successMsg ? <div className={classes.success}>Uspesno ste poslali podatke!</div> : null}
              {errorMsg ? <div className={classes.error}>Došlo je do greške!</div> : null}
              {alertMsg ? <div className={classes.alert}>Molim Vas unesite obavezna polja! *</div> : null}
            </div>
          </form>
        </div>
      </div>
    </Fragment>
  );
};

export default ContactForm;
