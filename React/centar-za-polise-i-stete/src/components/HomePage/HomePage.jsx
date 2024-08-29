import React, { Fragment } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';
import Services from './Services/Services.jsx';
import ContactForm from '../ContactForm/ContactForm.jsx';
import Swiper from '../UI/Swiper/Swiper.jsx';
import InfiniteLooper from '../UI/InfiniteLooper/InfiniteLooper.jsx';

const HomePage = () => {
  window.scrollTo(0, 0);
  return (
    <Fragment>
      <main className="main">
        <Hero />
        <AboutUs />
        <Counter />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />
        <InfiniteLooper />
      </main>
    </Fragment>
  );
};

export default HomePage;
