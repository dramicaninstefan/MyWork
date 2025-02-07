import { Fragment, useEffect } from 'react';

import ContactForm from '../UI/ContactForm/ContactForm.jsx';

const HomePage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return (
    <Fragment>
      <main className="main">
        <ContactForm />
        <ContactForm />
        <ContactForm />
        <ContactForm />
      </main>
    </Fragment>
  );
};

export default HomePage;
