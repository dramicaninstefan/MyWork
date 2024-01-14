import { Fragment } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';

import Home from './components/Home/Home';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';

function App() {
  window.onbeforeunload = function () {
    window.scrollTo(0, 0);
  };

  const router = createBrowserRouter([
    {
      path: '/',
      element: <RootLayout />,
      errorElement: <ErrorPage />,
      children: [
        { path: '/', element: <Home /> },
        { path: '/o_nama', element: <Home /> },
        { path: '/galerija', element: <Home /> },
        { path: '/usluge', element: <Home /> },
        { path: '/kontakt', element: <Home /> },
        { path: '/kasko', element: <Home /> },
      ],
    },
  ]);

  return (
    <Fragment>
      <RouterProvider router={router} />
    </Fragment>
  );
}

export default App;
