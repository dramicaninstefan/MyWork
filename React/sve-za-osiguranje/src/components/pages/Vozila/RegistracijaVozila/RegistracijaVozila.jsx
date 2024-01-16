import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './RegistracijaVozila.module.css';

import slika1 from '../../../../assets/registracija-400x390.jpg';

const RegistracijaVozila = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <Header backgroundColor="--white-color" backgroundColorScroll="--white-color" />
      <main className={classes.main}>
        <div className={classes.info1}>
          <div className={classes['content']}>
            <h2 className={classes['content-small-title']}>Registracija vozila</h2>
            <h1 className={classes['content-title']}>
              Komplet registracija vozila<span>.</span>
            </h1>
            <p className={classes['content-text']}>U mogućnosti smo da Vam organizujemo komplet registraciju za Vaše vozilo/vozila, najbliže Vašem mestu stanovanja. Kontaktirajte nas.</p>
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

export default RegistracijaVozila;
