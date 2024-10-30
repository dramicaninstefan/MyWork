import { Fragment, useEffect, useState } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';

import AOS from 'aos';
import 'aos/dist/aos.css';

import HomePage from './components/HomePage/HomePage';
import ContactPage from './components/pages/ContactPage/ContactPage.jsx';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';
import PolitikaPrivatnosti from './components/routes/PolitikaPrivatnosti';

import Preloader from './components/UI/Preloader/Preloader.jsx';
import BlogPage from './components/pages/BlogPage/BlogPage.jsx';
import AboutUsPage from './components/pages/AboutUsPage/AboutUsPage.jsx';
import BlogDetailsPage from './components/pages/BlogDetailsPage/BlogDetailsPage.jsx';

function App() {
  // Implement AOS for bootstrap
  useEffect(() => {
    AOS.init({});
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
        { path: '/', element: <HomePage /> },

        { path: '/o-nama', element: <AboutUsPage /> },
        { path: '/blog', element: <BlogPage /> },
        { path: '/blog/:blog_id', element: <BlogDetailsPage /> },
        { path: '/kontakt', element: <ContactPage /> },

        { path: '/politika-privatnosti', element: <PolitikaPrivatnosti /> },
      ],
    },
  ]);

  return <Fragment>{screenLoading ? <Preloader /> : <RouterProvider router={router} />}</Fragment>;
}

export default App;
