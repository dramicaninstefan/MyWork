import React, { Fragment } from 'react'

import classes from './Comments.module.css'

import image from '../../assets/slider1.jpg'

const Comments = (props) => {
  return (
    <Fragment>
      <div className={classes.container}>
        <div className={classes.card}>
          <h1>{props.user}</h1>
        </div>
        <div className={classes.image} style={{ backgroundImage: `url(${image})` }}></div>
      </div>
    </Fragment>
  )
}

export default Comments
