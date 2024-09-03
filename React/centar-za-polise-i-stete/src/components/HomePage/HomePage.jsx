import { Fragment } from 'react';

import Hero from './Hero/Hero.jsx';
import AboutUs from './AboutUs/AboutUs.jsx';
// import Counter from './Counter/Counter.jsx';
import WhyUs from './WhyUs/WhyUs.jsx';
import Services from './Services/Services.jsx';
import ContactForm from '../UI/ContactForm/ContactForm.jsx';
import Swiper from './Swiper/Swiper.jsx';
import InfiniteLooper from '../UI/InfiniteLooper/InfiniteLooper.jsx';
// import Team from './Team/Team.jsx';

const HomePage = () => {
  window.scrollTo(0, 0);
  return (
    <Fragment>
      <main className="main">
        <Hero />
        <AboutUs />
        {/* <Counter /> */}
        <InfiniteLooper />
        <WhyUs />
        <Services />
        <ContactForm />
        <Swiper />
        {/* <Team /> */}
      </main>
    </Fragment>
  );
};

export default HomePage;
