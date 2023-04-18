import React, { Fragment, useState } from 'react'

import classes from './CallUs.module.css'

const CallUs = () => {
  const [isOver, setIsOver] = useState(false)

  return (
    <Fragment>
      <a
        href="tel:066332095"
        className={classes.callUsBtn}
        // onMouseEnter={() => {
        //   setIsOver(true)
        // }}
        // onMouseLeave={() => {
        //   setIsOver(false)
        // }}
      >
        <div className={classes.circle}>
          <i className="fa-solid fa-phone"></i>
        </div>
        <div className={classes.dashed}></div>
        <div className={classes.box} style={{ width: isOver ? '220px' : '0px' }}>
          <h1 className={classes['box-title']} style={{ opacity: isOver ? '1' : '0' }}>
            Pozovite nas!
          </h1>
        </div>
      </a>
    </Fragment>
  )
}

export default CallUs
