import { Fragment } from 'react'
import teslaImage from '../../assets/Tesla.png'
import classes from './Tesla.module.css'

const TeslaImage = () => {
  return (
    <Fragment>
      <div className={classes.tesla}>
        <img src={teslaImage} alt="Slika Nikole Tesle" />
      </div>
    </Fragment>
  )
}

export default TeslaImage
