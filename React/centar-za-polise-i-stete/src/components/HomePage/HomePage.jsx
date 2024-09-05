import { Fragment, useState } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
// import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';
import Services from './Services/Services.jsx';
import ContactForm from '../UI/ContactForm/ContactForm.jsx';
import Swiper from './Swiper/Swiper.jsx';
import InfiniteLooper from '../UI/InfiniteLooper/InfiniteLooper.jsx';
import Modal from './Modal/Modal.jsx';
// import Team from './Team/Team.jsx';

const HomePage = () => {
  window.scrollTo(0, 0);
  const [isClicked, setIsClicked] = useState(false);

  const handleIsClicked = () => {
    setIsClicked((current) => !current);
  };

  return (
    <Fragment>
      <main className="main">
        <Hero handleClick={handleIsClicked} />
        <AboutUs />
        {/* <Counter /> */}
        <InfiniteLooper />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />
        {/* <Team /> */}
        {isClicked ? <Modal handleClick={handleIsClicked} /> : ``}
      </main>
    </Fragment>
  );
};

export default HomePage;
