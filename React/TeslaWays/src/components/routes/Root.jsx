import { Fragment } from 'react'
import { Outlet } from 'react-router-dom'

import Header from '../Layout/Header'
import Footer from '../Layout/Footer'
import TeslaImage from '../Tesla/Tesla'
import SocialIcons from '../SocialIcons/SocialIcons'

const RootLayout = () => {
  return (
    <Fragment>
      <Header></Header>
      <Outlet />
      <Footer />
      <SocialIcons />
      <TeslaImage />
    </Fragment>
  )
}

export default RootLayout
