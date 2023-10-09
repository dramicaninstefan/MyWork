import React, { Fragment } from 'react'

import Main from '../UI/Main'
import Header from '../Header/Header'
import Footer from '../Footer/Footer'

import classes from './ErrorPage.module.css'
import Loader from '../UI/Loader'
import { Link } from 'react-router-dom'

const ErrorPage = () => {
  return (
    <Fragment>
      <Header></Header>
      <Main>
        <div className={classes.wrapper}>
          <h1 className={classes.title}>Stranica nije pronadjena (404)</h1>
          <Loader />
          <Link to="/">Vrati se na početak</Link>
        </div>
      </Main>
      <Footer></Footer>
    </Fragment>
  )
}

export default ErrorPage
