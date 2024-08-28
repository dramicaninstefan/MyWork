import React, { Fragment } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';

const HomePage = () => {
  return (
    <Fragment>
      <main className="main">
        <Hero />
        <AboutUs />
        <Counter />
        <WhyUs />
      </main>
    </Fragment>
  );
};

export default HomePage;
