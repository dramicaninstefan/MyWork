import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './DobrovoljnoZdravstvenoOsiguranje.module.css';

const DobrovoljnoZdravstvenoOsiguranje = () => {
  return (
    <Fragment>
      <Header />
      <main className={classes.main}>
        <div id="contact-form"></div>
        <ContactForm />
      </main>

      <Footer />
    </Fragment>
  );
};

export default DobrovoljnoZdravstvenoOsiguranje;
