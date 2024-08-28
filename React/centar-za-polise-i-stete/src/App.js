import { Fragment } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';

import './App.css';

import HomePage from './components/HomePage/HomePage';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';
import PolitikaPrivatnosti from './components/routes/PolitikaPrivatnosti';

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
        { path: '/', element: <HomePage /> },
        { path: '/kasko-osiguranje-vozila', element: <HomePage /> },
        { path: '/autoodgovornost', element: <ErrorPage /> },
        { path: '/pomoc-na-putu', element: <ErrorPage /> },
        { path: '/registracija-vozila', element: <ErrorPage /> },

        { path: '/osiguranje-domacinstva', element: <ErrorPage /> },

        { path: '/zivotno-osiguranje', element: <ErrorPage /> },
        { path: '/dobrovoljno-zdravstveno-osiguranje', element: <ErrorPage /> },
        { path: '/osiguranje-od-nezgode', element: <ErrorPage /> },

        { path: '/putno-osiguranje', element: <ErrorPage /> },

        { path: '/naplata-naknada-stete', element: <ErrorPage /> },

        { path: '/politika-privatnosti', element: <PolitikaPrivatnosti /> },
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
