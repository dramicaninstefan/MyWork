import React, { Fragment, useEffect } from 'react';

import GLightbox from 'glightbox';
import 'glightbox/dist/css/glightbox.min.css';

import Hero from './Hero/Hero';
import AboutUs from './AboutUs/AboutUs';
import CallToAction from './CallToAction/CallToAction';
import Gallery from './Gallery/Gallery';
import Appointment from './Appointment/Appointment';
import Blog from './Blog/Blog';

const HomePage = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  // Implement GLightbox for bootstrap
  useEffect(() => {
    const lightbox = GLightbox({
      selector: '.glightbox',
      touchNavigation: true,
      loop: true,
    });

    // Cleanup when the component unmounts
    return () => lightbox.destroy();
  }, []);

  return (
    <Fragment>
      <main className="main">
        <Hero />
        <AboutUs />
        <CallToAction />
        <Gallery />
        <Appointment />
        <Blog />
      </main>
    </Fragment>
  );
};

export default HomePage;
