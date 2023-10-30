import React, { Fragment, useState, useRef } from 'react'
import emailjs from 'emailjs-com'
import { motion } from 'framer-motion'

import TabTitle from '../general/TabTitle'
import Header from '../Header/Header'
import Footer from '../Footer/Footer'

import classes from './Contact.module.css'

import contact2 from '../../assets/contact2.jpg'

const Contact = () => {
  TabTitle('Pet | Kontakt')
  window.scrollTo(0, 0)
  const nameRef = useRef()
  const emailRef = useRef()
  const numberRef = useRef()
  const messageRef = useRef()

  const [isSent, setIsSent] = useState(false)
  const [isntSent, setIsntSent] = useState(false)

  const submitBtn = useRef()
  const form = useRef()

  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [number, setNumber] = useState('')
  const [message, setMessage] = useState('')

  const sendEmail = (e) => {
    e.preventDefault()

    emailjs.sendForm('service_90anb7y', 'template_9yiiwdf', form.current, '_TykGN5dKmnTuxu5y').then(
      (result) => {
        setName('')
        setEmail('')
        setNumber('')
        setMessage('')
        setIsSent(true)
      },
      (error) => {
        setIsntSent(true)
      }
    )
  }

  const checkInfo = (e) => {
    if (nameRef.current.value === '') {
      nameRef.current.focus()
    } else if (emailRef.current.value === '') {
      nameRef.current.focus()
    } else if (numberRef.current.value === '') {
      nameRef.current.focus()
    } else if (messageRef.current.value === '') {
      nameRef.current.focus()
    } else {
      sendEmail(e)
    }
  }

  const closeInfoHandler = () => {
    setIsSent(false)
    setIsntSent(false)
  }

  if (isSent) {
    setTimeout(() => {
      setIsSent(false)
      setIsntSent(false)
    }, 3000)
  }

  return (
    <Fragment>
      {isSent ? (
        <div className={classes.success}>
          <p className={classes.information}>Poslato...</p>
          <button className={classes.btnX} onClick={closeInfoHandler}>
            X
          </button>
        </div>
      ) : null}

      {isntSent ? (
        <div className={classes.error}>
          <p className={classes.information}>Graska!</p>
          <button className={classes.btnX} onClick={closeInfoHandler}>
            X
          </button>
        </div>
      ) : null}

      <Header />

      <motion.div initial={{ x: '100%' }} transition={{ duration: 0.6 }} animate={{ x: 0 }} exit={{ opacity: 0 }} className={classes.wrapper}>
        {/* <h1 className={classes.title}>Kontakt</h1> */}
        <div className={classes.container}>
          <div className={classes.map} style={{ backgroundImage: `url(${contact2})` }}></div>

          <div className={classes.form}>
            <h1 className={classes.contact}>Kontaktirajte nas.</h1>
            <form ref={form} action="https://formsubmit.co/gamer95.g@email.com" method="POST">
              <input
                ref={nameRef}
                className={classes.input}
                name="user_name"
                type="text"
                placeholder="Ime i prezime *"
                onChange={(e) => {
                  setName(e.target.value)
                }}
                value={name}
                required
              />
              <input
                ref={emailRef}
                className={classes.input}
                name="user_email"
                type="email"
                placeholder="Email *"
                onChange={(e) => {
                  setEmail(e.target.value)
                }}
                value={email}
                required
              />
              <input
                ref={numberRef}
                className={classes.input}
                name="user_number"
                type="text"
                placeholder="Broj telefona *"
                onChange={(e) => {
                  setNumber(e.target.value)
                }}
                value={number}
                required
              />
              <textarea
                ref={messageRef}
                className={classes.input}
                name="message"
                placeholder="Poruka *"
                style={{ resize: 'none' }}
                onChange={(e) => {
                  setMessage(e.target.value)
                }}
                value={message}
                required
              ></textarea>
              <button ref={submitBtn} className={classes.btn} onClick={checkInfo} type="submit">
                Pošalji
              </button>
            </form>
          </div>
        </div>
      </motion.div>
      <Footer />
    </Fragment>
  )
}

export default Contact
