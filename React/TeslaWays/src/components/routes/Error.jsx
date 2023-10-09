import { Fragment } from 'react'

import Header from '../Layout/Header'
import Footer from '../Layout/Footer'
import TeslaImage from '../Tesla/Tesla'
import SocialIcons from '../SocialIcons/SocialIcons'

import classes from './Error.module.css'
import { Link } from 'react-router-dom'

const ErrorPage = () => {
  return (
    <Fragment>
      <Header></Header>
      <main className={classes.container}>
        <div className={classes.typewriter}>
          <div className={classes.slide}>
            <i></i>
          </div>
          <div className={classes.paper}></div>
          <div className={classes.keyboard}></div>
        </div>
        {/* <h1>Došlo je do greške, </h1> */}
        <h1 className={classes.title}>Stranica nije pronađena.</h1>
        <Link to={'/'} className={classes.button}>
          Vratite se na početak
          <div className={classes['arrow-wrapper']}>
            <div className={classes.arrow}></div>
          </div>
        </Link>
      </main>
      <Footer />
      <SocialIcons />
      <TeslaImage />
    </Fragment>
  )
}

export default ErrorPage
