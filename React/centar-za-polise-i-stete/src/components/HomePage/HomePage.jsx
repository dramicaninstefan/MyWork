import { Fragment, useState } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
// import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';
import Services from './Services/Services.jsx';
import ContactForm from '../UI/ContactForm/ContactForm.jsx';
import Swiper from './Swiper/Swiper.jsx';
import InfiniteLooper from '../UI/InfiniteLooper/InfiniteLooper.jsx';

import Modal from '../UI/Modal/Modal.jsx';
import ModalVideo from '../UI/ModalVideo/Modal.jsx';

import ModalButton from '../UI/Modal/ModalButton/ModalButton.jsx';

const HomePage = () => {
  window.scrollTo(0, 0);

  const [isClicked, setIsClicked] = useState(false);
  const [isClickedVideo, setIsClickedVideo] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  const handleIsClickedVideo = () => {
    setIsClickedVideo((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Hero handleClick={handleIsClickedVideo} />
        {/* <Hero handleClick={handleIsClicked} /> */}
        <AboutUs />
        <ModalButton handleClick={handleIsClicked} />
        {/* <Counter /> */}
        <InfiniteLooper />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />

        {isClickedVideo ? <ModalVideo handleClick={handleIsClickedVideo} /> : ``}
        {isClicked ? <Modal handleClick={handleIsClicked} /> : ``}
      </main>
    </Fragment>
  );
};

export default HomePage;
