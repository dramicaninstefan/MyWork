import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './KaskoOsiguranje.module.css';

import slika1 from '../../../../assets/kasko-osiguranje-400x390.jpg';

const KaskoOsiguranje = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Kasko osiguranje vozila</h2>
            <h1 className={classes['content-title']}>Kasko osiguranje.</h1>
            <p className={classes['content-text']}>
              Šta je kasko osiguranje vozila i zašto da <br /> odaberete ovo osiguranje za svoje vozilo?
            </p>
          </div>
          <div className={classes['image']}>
            <img src={slika1} alt="slika1" />
          </div>
        </div>

        <div id="contact-form"></div>
        <ContactForm />
      </main>

      <Footer />
    </Fragment>
  );
};

export default KaskoOsiguranje;
