import React, { Fragment } from 'react'

import Slider from '../Slider/Slider'
import TopButton from '../UI/TopButton'
import TabTitle from '../general/TabTitle'
import Main from '../UI/Main'

import classes from './Gallery.module.css'

import gallery1 from '../../assets/gallery1.jpg'
import gallery2 from '../../assets/gallery2.jpg'
import gallery3 from '../../assets/gallery3.jpg'
import gallery4 from '../../assets/gallery4.jpg'
import gallery5 from '../../assets/gallery5.jpg'
import gallery6 from '../../assets/gallery6.jpg'
import gallery7 from '../../assets/gallery7.jpg'
import CallUs from '../UI/CallUs'

const Gallery = () => {
  TabTitle('Pet | Galerija')
  window.scrollTo(0, 0)

  return (
    <Fragment>
      <Main>
        <h1 className={classes.title}>Galerija</h1>
        <Slider></Slider>
        <h1 className={classes.moto}>Stavite vašeg ljubimca na prvo mesto.</h1>
        <div className={classes.gallery}>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery1})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery2})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery3})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery4})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery5})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery6})` }}></div>
          <div className={classes.photo} style={{ backgroundImage: `url(${gallery7})` }}></div>
        </div>
        <CallUs />
        <TopButton></TopButton>
      </Main>
    </Fragment>
  )
}

export default Gallery
