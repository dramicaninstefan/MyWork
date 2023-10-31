import React, { Fragment } from 'react'

import classes from './TopButton.module.css'

const TopButton = () => {
  return (
    <Fragment>
      <div
        className={classes.toTopBtn}
        onClick={() => {
          window.scrollTo(0, 0)
        }}
      >
        <div className={classes.circle}>
          <i className="fa-solid fa-arrow-up"></i>
        </div>
        <div className={classes.dashed}></div>
      </div>
    </Fragment>
  )
}

export default TopButton
