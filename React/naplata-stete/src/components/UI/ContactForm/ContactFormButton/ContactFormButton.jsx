import React from 'react';
import { Link } from 'react-router-dom';

import classes from './ContactFormButton.module.css';

const ContactFormButton = () => {
  return (
    <Link
      onClick={(e) => {
        e.preventDefault();
        const y = document.getElementById('contact').offsetTop;
        window.scrollTo({ top: y - 180, behavior: 'smooth' });
      }}
      className={classes['btn-getstarted']}
    >
      Pošalji upit
    </Link>
  );
};

export default ContactFormButton;
