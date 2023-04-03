import React, { Fragment, useState } from 'react'

import classes from './Slider.module.css'

const Slider = ({ slides }) => {
  const [currentIndex, setCurrentIndex] = useState(0)

  function goToPrev() {
    const isFirstSlide = currentIndex === 0
    const newIndex = isFirstSlide ? slides.length - 1 : currentIndex - 1
    setCurrentIndex(newIndex)
  }

  function goToNext() {
    const isLastSlide = currentIndex === slides.length - 1
    const newIndex = isLastSlide ? 0 : currentIndex + 1
    setCurrentIndex(newIndex)
  }

  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.slider}>
          <div className={classes.leftArrowClass} onClick={goToPrev}>
            <i className="fa-solid fa-angle-left"></i>
          </div>
          <div className={classes.rightArrowClass} onClick={goToNext}>
            <i className="fa-solid fa-angle-right"></i>
          </div>
          <div
            className={classes.slide}
            style={{ backgroundImage: `url(${slides[currentIndex]?.url})` }}
          ></div>
        </div>
      </div>
    </Fragment>
  )
}

export default Slider
