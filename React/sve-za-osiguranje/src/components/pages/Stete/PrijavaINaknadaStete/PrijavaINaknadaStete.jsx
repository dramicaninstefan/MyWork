import { Fragment } from 'react';

import Header from '../../../Header/Header';
import Footer from '../../../Footer/Footer';
import ContactForm from '../../../ContactForm/ContactForm';

import classes from './PrijavaINaknadaStete.module.css';

const PrijavaINaknadaStete = () => {
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

export default PrijavaINaknadaStete;
