import { Fragment, useState, useEffect } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
// import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';
import Services from './Services/Services.jsx';
import ContactForm from '../UI/ContactForm/ContactForm.jsx';
import Swiper from './Swiper/Swiper.jsx';
import InfiniteLooper from '../UI/InfiniteLooper/InfiniteLooper.jsx';

import Modal from '../UI/Modal/Modal.jsx';
import ModalThankYou from '../UI/ModalThankYou/Modal.jsx';
import ModalVideo from '../UI/ModalVideo/Modal.jsx';

import ModalButton from '../UI/Modal/ModalButton/ModalButton.jsx';

const HomePage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  const [isClicked, setIsClicked] = useState(false);
  const [isClickedVideo, setIsClickedVideo] = useState(false);
  const [isClickedThankYou, setIsClickedThankYou] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  const handleIsClickedVideo = () => {
    setIsClickedVideo((current) => !current);
  };

  const handleIsClickedThankYou = () => {
    setIsClickedThankYou((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Hero handleClickVideo={handleIsClickedVideo} handleClickThankYou={handleIsClickedThankYou} handleClick={handleIsClicked} />
        <ModalButton handleClick={handleIsClicked} />
        <AboutUs />
        {/* <Counter /> */}
        <InfiniteLooper />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />

        {isClicked ? <Modal handleClick={handleIsClicked} /> : ``}
        {isClickedVideo ? <ModalVideo handleClick={handleIsClickedVideo} /> : ``}
        {isClickedThankYou ? <ModalThankYou handleClick={handleIsClickedThankYou} /> : ``}
      </main>
    </Fragment>
  );
};

export default HomePage;
