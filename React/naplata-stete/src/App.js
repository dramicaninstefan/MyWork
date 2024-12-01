import { Fragment, useEffect, useState } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';

import AOS from 'aos';
import 'aos/dist/aos.css';

import NaplataStete from './components/pages/NaplataStete/NaplataStete';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';
import PolitikaPrivatnosti from './components/routes/PolitikaPrivatnosti';
import ThankYouPage from './components/pages/ThankYouPage/ThankYouPage';

import Preloader from './components/UI/Preloader/Preloader.jsx';

function App() {
  // Implement AOS for bootstrap animations
  useEffect(() => {
    AOS.init({
      disable: function () {
        var maxWidth = 800;
        return window.innerWidth < maxWidth;
      },
    });
  }, []);

  // Preloader
  const [screenLoading, setScreenLoading] = useState(false);

  useEffect(() => {
    setScreenLoading(true);
    setTimeout(() => {
      setScreenLoading(false);
    }, 500);
  }, []);

  window.onbeforeunload = function () {
    window.scrollTo(0, 0);
  };

  const router = createBrowserRouter([
    {
      path: '/',
      element: <RootLayout />,
      errorElement: <ErrorPage />,
      children: [
        { path: '/', element: <NaplataStete /> },

        { path: '/politika-privatnosti', element: <PolitikaPrivatnosti /> },
        { path: '/hvala-vam', element: <ThankYouPage /> },
      ],
    },
  ]);

  return <Fragment>{screenLoading ? <Preloader /> : <RouterProvider router={router} />}</Fragment>;
}

export default App;
