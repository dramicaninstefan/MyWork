import { Fragment } from 'react'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'

import Home from './components/Home/Home'
import AboutUs from './components/AboutUs/AboutUs'
import Gallery from './components/Gallery/Gallery'
import Contact from './components/Contact/Contact'

import RootLayout from './components/routes/RootLayout'
import ErrorPage from './components/routes/ErrorPage'

function App() {
  window.onbeforeunload = function () {
    window.scrollTo(0, 0)
  }

  const router = createBrowserRouter([
    {
      path: '/',
      element: <RootLayout />,
      errorElement: <ErrorPage />,
      children: [
        { path: '/', element: <Home /> },
        { path: '/o_nama', element: <AboutUs /> },
        { path: '/galerija', element: <Gallery /> },
        { path: '/usluge', element: <Home /> },
        { path: '/kontakt', element: <Contact /> },
        { path: '/veterinar', element: <Home /> },
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
