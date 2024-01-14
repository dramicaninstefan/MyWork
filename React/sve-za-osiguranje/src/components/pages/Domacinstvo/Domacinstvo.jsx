import { Fragment } from 'react';

import Header from '../../Header/Header';
import Footer from '../../Footer/Footer';
import ContactForm from '../../ContactForm/ContactForm';

import classes from './Domacinstvo.module.css';

const Domacinstvo = () => {
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

export default Domacinstvo;