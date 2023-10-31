import React, { Fragment, useRef, useState } from 'react'

import classes from './Slider.module.css'

import slider1 from '../../assets/slider1.jpg'
import slider2 from '../../assets/slider2.jpg'
import slider3 from '../../assets/slider3.jpg'
import slider4 from '../../assets/slider4.jpg'
import slider5 from '../../assets/slider5.jpg'

const Slider = () => {
  const [index, setIndex] = useState()

  const panels = useRef([])
  panels.current = []

  const addToPanels = (el) => {
    if (el && !panels.current.includes(el)) {
      panels.current.push(el)
    }

    panels.current?.map((panel, idx) => {
      panel.addEventListener('click', () => {
        setIndex(idx)
      })
    })

    panels.current?.map((panels, idx) => {
      if (index === idx) {
        panels.classList.add(`${classes.active}`)
      } else {
        panels.classList.remove(`${classes.active}`)
      }
    })
  }

  return (
    <Fragment>
      <div className={classes.container}>
        <div ref={addToPanels} className={`${classes.panel} `} style={{ backgroundImage: `url(${slider1})` }}>
          <h3>Happy dogs.</h3>
        </div>
        <div ref={addToPanels} className={classes.panel} style={{ backgroundImage: `url(${slider2})` }}>
          <h3>Happy dogs.</h3>
        </div>
        <div ref={addToPanels} className={classes.panel} style={{ backgroundImage: `url(${slider3})` }}>
          <h3>Happy dogs.</h3>
        </div>
        <div ref={addToPanels} className={classes.panel} style={{ backgroundImage: `url(${slider4})` }}>
          <h3>Happy dogs.</h3>
        </div>
        <div ref={addToPanels} className={classes.panel} style={{ backgroundImage: `url(${slider5})` }}>
          <h3>Happy dogs.</h3>
        </div>
      </div>
    </Fragment>
  )
}

export default Slider
