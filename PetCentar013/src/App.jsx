import React, { Fragment } from 'react'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'

import RootLayout from './Components/routes/RootLayout'
import ErrorPage from './Components/routes/ErrorPage'

import HomePage from './Components/Home/HomePage'
import AboutUs from './Components/AboutUs/AboutUs'
import Gallery from './Components/Gallery/Gallery'

const App = () => {
  window.onbeforeunload = function () {
    window.scrollTo(0, 0)
  }

  const router = createBrowserRouter([
    {
      path: '/',
      element: <RootLayout />,
      errorElement: <ErrorPage />,
      children: [
        { path: '/', element: <HomePage /> },
        { path: '/o_nama', element: <AboutUs /> },
        { path: '/galerija', element: <Gallery /> },
        { path: '/usluge', element: <HomePage /> },
        { path: '/veterinar', element: <HomePage /> },
      ],
    },
  ])

  return (
    <Fragment>
      <RouterProvider router={router} />
    </Fragment>
  )
}

export default App
