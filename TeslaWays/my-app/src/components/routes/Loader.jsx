import React from 'react'

import classes from './Loader.module.css'

const Loader = () => {
  return (
    <div className={classes.loadingspinner}>
      <div className={classes.square1}></div>
      <div className={classes.square2}></div>
      <div className={classes.square3}></div>
      <div className={classes.square4}></div>
      <div className={classes.square5}></div>
    </div>
  )
}

export default Loader
