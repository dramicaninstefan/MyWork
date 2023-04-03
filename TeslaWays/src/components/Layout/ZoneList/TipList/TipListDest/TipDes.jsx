import React from 'react'
import { Link } from 'react-router-dom'
import classes from './TipDes.module.css'

const TipDes = ({ filtered, isClicked }) => {
  return (
    <Link
      className={classes.tipDesLink}
      key={filtered.id}
      to={`/lokacije/${filtered.id}`}
      style={{ display: isClicked ? 'block' : 'none' }}
    >
      {filtered.naslov}
    </Link>
  )
}

export default TipDes
