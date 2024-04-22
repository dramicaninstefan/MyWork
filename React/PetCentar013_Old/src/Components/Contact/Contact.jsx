import { Fragment, useState, useRef } from 'react';
import emailjs from 'emailjs-com';

import Main from '../UI/Main';
import TabTitle from '../general/TabTitle';

import TopButton from '../UI/TopButton';
import CallUs from '../UI/CallUs';

import classes from './Contact.module.css';

import contact2 from '../../assets/contact2.jpg';

const Contact = () => {
  TabTitle('Pet | Kontakt');
  window.scrollTo(0, 0);

  const submitBtn = useRef();
  const form = useRef();

  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [number, setNumber] = useState('');
  const [message, setMessage] = useState('');

  function sendEmail(e) {
    e.preventDefault();

    emailjs.sendForm('service_90anb7y', 'template_9yiiwdf', form.current, '_TykGN5dKmnTuxu5y').then(
      (result) => {
        setName('');
        setEmail('');
        setNumber('');
        setMessage('');
        alert('Podaci su poslati!');
      },
      (error) => {
        console.log(error.text);
      }
    );
  }

  return (
    <Fragment>
      <Main>
        <h1 className={classes.title}>Kontakt</h1>
        <div className={classes.container}>
          <div className={classes.map} style={{ backgroundImage: `url(${contact2})` }}></div>

          <div className={classes.form}>
            <h1 className={classes.contact}>Kontaktirajte nas.</h1>
            <form ref={form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
              <input
                className={classes.input}
                name="user_name"
                type="text"
                placeholder="Ime i prezime *"
                onChange={(e) => {
                  setName(e.target.value);
                }}
                value={name}
                required
              />
              <input
                className={classes.input}
                name="user_email"
                type="email"
                placeholder="Email *"
                onChange={(e) => {
                  setEmail(e.target.value);
                }}
                required
                value={email}
              />
              <input
                className={classes.input}
                name="user_number"
                type="text"
                placeholder="Broj telefona *"
                onChange={(e) => {
                  setNumber(e.target.value);
                }}
                required
                value={number}
              />
              <textarea
                className={classes.input}
                name="message"
                placeholder="Poruka *"
                style={{ resize: 'none' }}
                onChange={(e) => {
                  setMessage(e.target.value);
                }}
                required
                value={message}
              ></textarea>
              <button ref={submitBtn} className={classes.btn} onClick={sendEmail} type="submit">
                Pošalji
              </button>
            </form>
          </div>
        </div>
        <CallUs />
        {/* <TopButton /> */}
      </Main>
    </Fragment>
  );
};

export default Contact;
