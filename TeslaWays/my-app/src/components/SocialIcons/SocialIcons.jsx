import facebookIcon from '../../assets/facebook.png'
import twitterIcon from '../../assets/twitter.png'
import googleIcon from '../../assets/googleplus.png'

import classes from './SocialIcons.module.css'
import { Fragment } from 'react'

const SocialIcons = () => {
  return (
    <Fragment>
      <div className={classes.social}>
        <a href="https://www.facebook.com/TeslaWays" target="_blank" rel="noreferrer">
          <img className={classes.icons} src={facebookIcon} alt="Facebook Icon" />
        </a>
        <a href="#">
          <img className={classes.icons} src={twitterIcon} alt="Twitter Icon" />
        </a>
        <a href="#">
          <img className={classes.icons} src={googleIcon} alt="GooglePlus Icon" />
        </a>
      </div>
    </Fragment>
  )
}

export default SocialIcons
