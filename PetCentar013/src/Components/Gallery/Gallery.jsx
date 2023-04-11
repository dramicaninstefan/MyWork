import React, { Fragment } from 'react'

import Slider from '../Slider/Slider'
import TopButton from '../UI/TopButton'
import TabTitle from '../general/TabTitle'
import Main from '../UI/Main'

import classes from './Gallery.module.css'

const Gallery = () => {
  TabTitle('Pet | Galerija')
  window.scrollTo(0, 0)

  return (
    <Fragment>
      <Main>
        <h1 className={classes.title}>Galerija</h1>
        <Slider></Slider>
        <TopButton></TopButton>
      </Main>
    </Fragment>
  )
}

export default Gallery
