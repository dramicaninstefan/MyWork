import { useState } from 'react';

import classes from './ToTop.module.css';

const ToTop = () => {
  // show to top button
  const [toTop, setToTop] = useState(false);
  const toTopButton = () => {
    if (window.scrollY >= 550) {
      setToTop(true);
    } else {
      setToTop(false);
    }
  };

  window.addEventListener('scroll', toTopButton);

  // go to top

  const handleChange = () => {
    window.scrollTo(0, 0);
  };

  return (
    <div className={toTop ? `${classes['scroll-up']} ${classes.active}` : `${classes['scroll-up']}`} onClick={handleChange}>
      <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0h24v24H0z" fill="none"></path>
        <path fill="rgba(255,255,255,1)" d="M11.9997 10.8284L7.04996 15.7782L5.63574 14.364L11.9997 8L18.3637 14.364L16.9495 15.7782L11.9997 10.8284Z"></path>
      </svg>
    </div>
  );
};

export default ToTop;
