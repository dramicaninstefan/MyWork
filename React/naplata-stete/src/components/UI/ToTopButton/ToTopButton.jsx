import React, { Fragment, useEffect, useState } from 'react';

import classes from './ToTopButton.module.css';

const ToTopButton = () => {
  const [isScrolled, setIsScrolled] = useState(false);
  const [scrollPosition, setScrollPosition] = useState(0);

  const handleScroll = () => {
    const position = window.scrollY || window.pageYOffSet;
    setScrollPosition(position);
  };

  useEffect(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });

    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  useEffect(() => {
    scrollPosition > 150 ? setIsScrolled(true) : setIsScrolled(false);
  }, [scrollPosition]);

  const handleBtnClick = () => {
    window.scrollTo(0, 0);
  };

  return (
    <Fragment>
      <button
        id="scroll-top"
        style={{ border: `0` }}
        className={
          isScrolled ? `${classes['scroll-top']} ${classes.active} d-flex align-items-center justify-content-center` : `${classes['scroll-top']} d-flex align-items-center justify-content-center`
        }
        onClick={handleBtnClick}
      >
        <i className="bi bi-arrow-up-short"></i>
      </button>
    </Fragment>
  );
};

export default ToTopButton;
