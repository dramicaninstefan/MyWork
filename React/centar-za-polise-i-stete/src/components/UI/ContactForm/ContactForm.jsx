import React, { Fragment } from 'react';

import classes from './ContactForm.module.css';

const ContactForm = () => {
  return (
    <Fragment>
      <div id="contact"></div>
      <div className={`container-fluid ${classes.contact} my-5 py-5 wow fadeIn`} data-wow-delay="0.1s">
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
                +381 608060001
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
                <form>
                  <div className="row g-3">
                    <div className="col-sm-6">
                      <div className="form-floating">
                        <input type="text" className="form-control" id="gname" />
                        <label htmlFor="gname">Ime *</label>
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="form-floating">
                        <input type="text" className="form-control" id="cname" />
                        <label htmlFor="cname">Broj telefona *</label>
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="form-floating">
                        <input type="email" className="form-control" id="gmail" />
                        <label htmlFor="gmail">Email (Opciono)</label>
                      </div>
                    </div>
                    <div className="col-sm-6">
                      <div className="form-floating">
                        <select className="form-control" name="" id="">
                          <option value=""></option>
                          <option value="Kasko osiguranje">Kasko osiguranje</option>
                          <option value="Naplata štete">Naplata štete</option>
                          <option value="Životno Osiguranje">Životno Osiguranje</option>
                          <option value="Putno osiguranje">Putno osiguranje</option>
                          <option value="Osiguranje imovine">Osiguranje imovine</option>
                          <option value="Dobrovoljno Zdravstveno Osiguranje">Dobrovoljno Zdravstveno Osiguranje</option>
                          <option value="Osiguranje od nezgode">Osiguranje od nezgode</option>
                          <option value="Osiguranje od odgovornosti">Osiguranje od odgovornosti</option>
                        </select>
                        <label htmlFor="gmail">Zainteresovan sam za: *</label>
                      </div>
                    </div>
                    <div className="col-12">
                      <div className="form-floating">
                        <textarea className="form-control" id="message" style={{ height: `180px` }}></textarea>
                        <label htmlFor="message">Kako možemo da Vam pomognemo? *</label>
                      </div>
                    </div>
                    <div className="col-12">
                      <button className="btn btn-primary py-3 px-5" type="submit">
                        Pošalji upit
                      </button>
                    </div>
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
