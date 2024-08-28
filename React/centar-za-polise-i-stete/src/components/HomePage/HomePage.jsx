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
  return (
    <Fragment>
      <main className="main">
        <Hero />
        <InfiniteLooper />
        <AboutUs />
        <Counter />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />
      </main>
    </Fragment>
  );
};

export default HomePage;
