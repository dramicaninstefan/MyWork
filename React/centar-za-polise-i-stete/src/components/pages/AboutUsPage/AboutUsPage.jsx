import React, { Fragment, useState, useEffect } from 'react';

import Hero from './Hero/Hero';
import AboutUs from '../../HomePage/AboutUs/AboutUs';
import Team from './Team/Team';

import ModalButton from '../../UI/Modal/ModalButton/ModalButton';
import ContactForm from '../../UI/ContactForm/ContactForm';
import Modal from '../../UI/Modal/Modal';

// import bgImage from '../../../assets/img/team-page-title-bg.jpg';

const AboutUsPage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const [isClicked, setIsClicked] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Hero />
        <Team />
        <ContactForm />
        <ModalButton handleClick={handleIsClicked} />
        <AboutUs />

        {isClicked ? <Modal handleClick={handleIsClicked} /> : undefined}
      </main>
    </Fragment>
  );
};

export default AboutUsPage;
