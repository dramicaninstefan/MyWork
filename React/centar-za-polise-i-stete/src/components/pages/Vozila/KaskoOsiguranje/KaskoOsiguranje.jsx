import { Fragment } from 'react';

import Hero from './Hero/Hero';

import FAQ from './FAQ/FAQ';
import Features from './Features/Features';
// import Counter from '../../../UI/Counter/Counter';
import ContactForm from '../../../UI/ContactForm/ContactForm';

// import image from '../../../../assets/img/kasko-counter-bg.jpg';

const KaskoOsiguranje = () => {
  window.scrollTo(0, 0);

  return (
    <Fragment>
      <main className="main">
        <Hero />
        <Features />
        <ContactForm />
        {/* <Counter image={image} /> */}
        <FAQ />
      </main>
    </Fragment>
  );
};

export default KaskoOsiguranje;
