import React, { Fragment } from 'react'

import classes from './Card.module.css'

import play from '../../../assets/play.png'
import walk from '../../../assets/walk.png'
import yard from '../../../assets/yard.png'
import play2 from '../../../assets/play2.png'
import walk2 from '../../../assets/walk2.png'
import yard2 from '../../../assets/yard2.png'

const Card = () => {
  return (
    <Fragment>
      <div className={classes.cards}>
        <div className={classes.card}>
          <img className={classes.cardImage} src={play2} alt="" />
          <h3 className={classes.cardTitle}>Igranje</h3>
          <p className={classes.cardText}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, mollitia!</p>
        </div>
        <div className={classes.card}>
          <img className={classes.cardImage} src={walk2} alt="" />
          <h3 className={classes.cardTitle}>Šetnja</h3>
          <p className={classes.cardText}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, mollitia!</p>
        </div>
        <div className={classes.card}>
          <img className={classes.cardImage} src={yard2} alt="" />
          <h3 className={classes.cardTitle}>Prostrano dvorište</h3>
          <p className={classes.cardText}>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, mollitia!</p>
        </div>
      </div>
    </Fragment>
  )
}

export default Card
