import React, { Fragment } from 'react'

import classes from './Card.module.css'

const Card = (props) => {
  return (
    <Fragment>
      <div className={classes.container}>
        <img src={props.image} alt="dog" />
        <h1 className={classes.title}>{props.title}</h1>
        <p className={classes.text}>{props.text}</p>
      </div>
    </Fragment>
  )
}

export default Card
