import React, { Fragment } from 'react';

import classes from './ContactForm.module.css';

const ContactForm = () => {
  return (
    <Fragment>
      <div className={classes['contact-form']}>
        <div className={classes.content}>
          <div className={classes.info}>
            <h1 className={classes.title}>
              Vaš lični <br /> konsultant
            </h1>
            <h2 className={classes.link}>
              <i className="fa-solid fa-phone"></i>Telefon
            </h2>
            <a href="https://maps.app.goo.gl/KbuoyivndrgjJfGZ8" target="_blank" rel="noreferrer" className={classes.adress}>
              +381 608060001
            </a>
            <h2 className={classes.link}>
              <i className="fa-solid fa-envelope"></i>Email
            </h2>
            <a href="mailto: svezaosiguranje@gmail.com" className={classes.email}>
              svezaosiguranje@gmail.com
            </a>
          </div>
          <form className={classes.form}>
            <div className={classes['form-client-data']}>
              <div className={classes.inputs}>
                <label htmlFor="firstName">Ime *</label>
                <input type="text" id="firstName" placeholder="Ime Prezime*" required />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="number">Telefon *</label>
                <input type="text" id="number" placeholder="(123)-456-7890*" required />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="email">Email</label>
                <input type="text" id="email" placeholder="ime@gmail.com" />
              </div>
              <div className={classes.inputs}>
                <label htmlFor="type">Zainteresovan sam za *</label>
                <select name="" id="type">
                  <option>Izaberi:</option>
                  <option value="Polisa za Kasko osiguranje">Polisa za Kasko osiguranje</option>
                  <option value="Polisa za Životno Osiguranje">Polisa za Životno Osiguranje</option>
                  <option value="Polisa za Putno osiguranje">Polisa za Putno osiguranje</option>
                  <option value="Polisa za Osiguranje imovine">Polisa za Osiguranje imovine</option>
                  <option value="Polisa za Dobrovoljno Zdravstveno Osiguranje">Polisa za Dobrovoljno Zdravstveno Osiguranje</option>
                  <option value="Polisa za Osiguranje od nezgode">Polisa za Osiguranje od nezgode</option>
                  <option value="Polisa za Osiguranje od odgovornosti">Polisa za Osiguranje od odgovornosti</option>
                </select>
              </div>
              <div className={classes.inputs}>
                <label htmlFor="message">Kako možemo da Vam pomognemo? *</label>
                <textarea name="message" id="message" placeholder="Treba mi pomoc oko..." required></textarea>
              </div>
              <button className={classes.btn}>Pošaljite upit</button>
            </div>
          </form>
        </div>
      </div>
    </Fragment>
  );
};

export default ContactForm;
