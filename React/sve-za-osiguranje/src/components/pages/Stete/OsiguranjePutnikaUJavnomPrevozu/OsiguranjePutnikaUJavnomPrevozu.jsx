import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './OsiguranjePutnikaUJavnomPrevozu.module.css';

const OsiguranjePutnikaUJavnomPrevozu = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header />
      <main className={classes.main}>
        <div className={classes.hero}>
          <div className={classes.content}>
            <h2 className={classes['small-title']}>OSIGURANJE PUTNIKA U JAVNOM PREVOZU</h2>
            <h1 className={classes['title']}>
              OSIGURANJE PUTNIKA U <br /> JAVNOM PREVOZU<span>.</span>
            </h1>
          </div>
        </div>

        <div className={classes.info1}>
          <p className={classes.text}>
            Kao putnici u gradskom prevozu znamo da moramo da platimo kartu.
            <br />
            Ali, da li znate koja su vaša prava u slučaju nezgode u javnom prevozu?
            <br />
            Zakon o obaveznom osiguranju u saobraćaju reguliše osiguranje putnika u slučaju nezgode u javnom prevozu. Zakonom su regulisani slučajevi koji su pokriveni osiguranjem, kao i visina
            osigurane sume i način naplate štete.
            <br />U slučaju da dođe do nezgode neposredno, građani koji koriste prevoz mogu da zahtevaju naknadu štete na osnovu ugovora o osiguranju.
          </p>
        </div>

        <div id="contact-form"></div>
        <ContactForm />
      </main>

      <Footer />
    </Fragment>
  );
};

export default OsiguranjePutnikaUJavnomPrevozu;
