import React, { Fragment } from 'react'
import { Outlet } from 'react-router-dom'

import Header from '../Header/Header'
import Footer from '../Footer/Footer'

const RootLayout = () => {
  return (
    <Fragment>
      <Header />
      <Outlet />
      <Footer />
    </Fragment>
  )
}

export default RootLayout
