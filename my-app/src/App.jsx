import React, { Fragment } from 'react'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'

import RootLayout from './Components/routes/RootLayout'
import ErrorPage from './Components/routes/ErrorPage'

import HomePage from './Components/Home/HomePage'

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
        { path: '/o_nama', element: <HomePage /> },
        { path: '/galerija', element: <HomePage /> },
        { path: '/kontakt', element: <HomePage /> },
        { path: '/usluge', element: <HomePage /> },
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
