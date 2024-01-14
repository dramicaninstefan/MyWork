import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './KaskoOsiguranje.module.css';

const KaskoOsiguranje = () => {
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

export default KaskoOsiguranje;
