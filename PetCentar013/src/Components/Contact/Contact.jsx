import React, { Fragment, useState } from 'react'

import Main from '../UI/Main'

import classes from './Contact.module.css'

import contact2 from '../../assets/contact2.jpg'

const Contact = () => {
  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [number, setNumber] = useState('')
  const [message, setMessage] = useState('')

  function sendEmail(e) {
    console.log(name)
    console.log(email)
    console.log(number)
    console.log(message)
  }

  return (
    <Fragment>
      <Main>
        <h1 className={classes.title}>Kontakt</h1>
        <div className={classes.container}>
          <div className={classes.map} style={{ backgroundImage: `url(${contact2})` }}></div>

          <div className={classes.form}>
            <h1>Kontaktirajte nas.</h1>
            <form action="https://formsubmit.co/gamer95.g@email.com" method="POST">
              <input
                className={classes.input}
                required
                name="user_name"
                type="text"
                placeholder="Ime i prezime *"
                onChange={(e) => {
                  setName(e.target.value)
                }}
              />
              <input
                className={classes.input}
                required
                name="user_email"
                type="email"
                placeholder="Email *"
                onChange={(e) => {
                  setEmail(e.target.value)
                }}
              />
              <input
                className={classes.input}
                required
                name="user_number"
                type="text"
                placeholder="Broj telefona *"
                onChange={(e) => {
                  setNumber(e.target.value)
                }}
              />
              <textarea
                className={classes.input}
                required
                name="message"
                placeholder="Poruka *"
                style={{ resize: 'none' }}
                onChange={(e) => {
                  setMessage(e.target.value)
                }}
              ></textarea>
              <button className={classes.btn} onClick={sendEmail} type="submit">
                Pošalji
              </button>
            </form>
          </div>
        </div>
      </Main>
    </Fragment>
  )
}

export default Contact
