import { Fragment } from 'react'
import { Link } from 'react-router-dom'

import classes from './Backplate.module.css'

import background from '../../../assets/background.jpg'

const Backplate = () => {
  return (
    <Fragment>
      <div style={{ backgroundImage: `url(${background})` }} className={classes.background}></div>
      <div className={classes.backplate}>
        <h1 className={classes.title}>
          Najbolje mesto za <br /> vaše ljubimce.
        </h1>
        <Link to="/kontakt">
          <button className={classes.btn}>Kontaktirajte Nas.</button>
        </Link>
      </div>
    </Fragment>
  )
}

export default Backplate
