import React, { Fragment } from 'react'

import classes from './Card.module.css'

const Card = (props) => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.image} style={{ backgroundImage: `url(${props.image})` }}></div>
        <h1 className={classes.title}>{props.title}</h1>
        <p className={classes.text}>{props.text}</p>
      </div>
    </Fragment>
  )
}

export default Card
