import React, { Fragment, useRef } from 'react'

import classes from './Comments.module.css'
import styles from '../cssStars/stars.module.css'

import gallery1 from '../../assets/gallery1.jpg'
import gallery2 from '../../assets/gallery2.jpg'
import gallery3 from '../../assets/gallery3.jpg'
import gallery4 from '../../assets/gallery4.jpg'
import gallery5 from '../../assets/gallery5.jpg'
import gallery6 from '../../assets/gallery6.jpg'

const comments = [
  {
    user: 'Stefan',
    rate: 5,
    text: 'Omg, is it real? Start building your own. Get you car Insurance in California.',
    image: gallery1,
  },
  {
    user: 'Mihajlo',
    rate: 4,
    text: 'Wow, is this a fake Facebook Post? Damn it looks so real! Use the settings to the left to begin - You can also add comments & emoticons.',
    image: gallery2,
  },
  {
    user: 'Goran',
    rate: 2,
    text: 'Omg, is it real? Start building your own. Get you car Insurance in California.',
    image: gallery3,
  },
  {
    user: 'Sanja',
    rate: 1,
    text: 'Wow, is this a fake Facebook Post? Damn it looks so real! Use the settings to the left to begin - You can also add comments & emoticons.',
    image: gallery5,
  },
]

const Comments = () => {
  const sliderContainer = useRef()
  const slideRight = useRef()
  const slidesLeft = useRef([])
  const slideLeft = useRef()
  const upButton = useRef()
  const downButton = useRef()

  const slideLenght = comments.length

  slidesLeft.current = []

  const addToSlideLeft = (el) => {
    if (el && !slidesLeft.current.includes(el)) {
      slidesLeft.current.push(el)
    }
  }

  let activeSlideIndex = 0

  // slideLeft.current.style.top = `-${(slideLenght - 1) * 100}%`

  const changeSlide = (direction) => {
    const sliderHeight = sliderContainer.current.clientHeight
    if (direction === 'up') {
      activeSlideIndex++
      if (activeSlideIndex > slideLenght - 1) {
        activeSlideIndex = 0
      }
    } else if (direction === 'down') {
      activeSlideIndex--
      if (activeSlideIndex < 0) {
        activeSlideIndex = slideLenght - 1
      }
    }

    slideRight.current.style.transform = `translateY(-${activeSlideIndex * sliderHeight}px)`
    slideLeft.current.style.transform = `translateY(-${activeSlideIndex * sliderHeight}px)`
  }

  return (
    <Fragment>
      <div ref={sliderContainer} className={classes['slider-container']}>
        <div ref={slideLeft} className={classes['left-slide']}>
          {comments?.map((comment, idx) => {
            return <div key={idx} ref={addToSlideLeft} style={{ backgroundImage: `url(${comment.image})` }}></div>
          })}
        </div>
        <div ref={slideRight} className={classes['right-slide']}>
          {comments?.map((comment, idx) => {
            return (
              <div key={idx} className={classes.comment}>
                <h1 className={classes['right-slide-title']}>{comment.user}</h1>
                <p className={`${styles['starability-result']} ${classes.starability}`} data-rating={comment.rate}>
                  Rated: 3 stars
                </p>
                <p className={classes['right-slide-text']}>{comment.text}</p>
              </div>
            )
          })}
        </div>
        <div className={classes['action-buttons']}>
          <button
            ref={downButton}
            className={classes['down-button']}
            onClick={() => {
              changeSlide('up')
            }}
          >
            <i className="fa-solid fa-arrow-down"></i>
          </button>
          <button
            ref={upButton}
            className={classes['up-button']}
            onClick={() => {
              changeSlide('down')
            }}
          >
            <i className="fa-solid fa-arrow-up"></i>
          </button>
        </div>
      </div>
    </Fragment>
  )
}

export default Comments
