import { Fragment } from 'react'
import { createBrowserRouter, RouterProvider } from 'react-router-dom'
import RootLayout from './components/routes/Root'
import Home from './components/Home/Home'
import ErrorPage from './components/routes/Error'
import NewsDetals from './components/News/NewsDetail/NewsDetail'
import ViewsDetals from './components/Destinations/ViewsDetail/ViewDetail'
import AllNews from './components/News/AllNews/AllNews'
import Destination from './components/Destinations/AllDestinations/Destination'
import AboutUs from './components/AboutUs/AboutUs'
import Admin from './components/routes/Admin/Admin'

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
      { path: '/vesti', element: <AllNews /> },
      { path: '/vesti/:news_id', element: <NewsDetals /> },
      { path: '/lokacije', element: <Destination /> },
      { path: '/lokacije/:views_id', element: <ViewsDetals /> },
    ],
  },
  {
    path: '/admin',
    element: <Admin />,
  },
])

function App() {
  return (
    <Fragment>
      <RouterProvider router={router} />
    </Fragment>
  )
}

export default App
