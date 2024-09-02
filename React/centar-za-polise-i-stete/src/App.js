import { Fragment, useEffect, useState } from 'react';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import AOS from 'aos';
import 'aos/dist/aos.css';

import './App.css';

import HomePage from './components/HomePage/HomePage';

import KaskoOsiguranje from './components/pages/Vozila/KaskoOsiguranje/KaskoOsiguranje';
import Autoodgovornost from './components/pages/Vozila/Autoodgovornost/Autoodgovornost';
import PomocNaPutu from './components/pages/Vozila/PomocNaPutu/PomocNaPutu';
import RegistracijaVozila from './components/pages/Vozila/RegistracijaVozila/RegistracijaVozila';

import Domacinstvo from './components/pages/Domacinstvo/Domacinstvo';

import ZivotnoOsiguranje from './components/pages/ZivotnoIZdravstveno/ZivotnoOsiguranje/ZivotnoOsiguranje';
import DobrovoljnoZdravstvenoOsiguranje from './components/pages/ZivotnoIZdravstveno/DobrovoljnoZdravstvenoOsiguranje/DobrovoljnoZdravstvenoOsiguranje';
import OsiguranjeOdNezgode from './components/pages/ZivotnoIZdravstveno/OsiguranjeOdNezgode/OsiguranjeOdNezgode';

import Putno from './components/pages/Putno/Putno';

import NaplataStete from './components/pages/NaplataStete/NaplataStete';

import RootLayout from './components/routes/RootLayout';
import ErrorPage from './components/routes/ErrorPage';
import PolitikaPrivatnosti from './components/routes/PolitikaPrivatnosti';

import Preloader from './components/UI/Preloader/Preloader.jsx';

function App() {
  // Implement AOS for bootstrap animations
  useEffect(() => {
    AOS.init();
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
        { path: '/kasko-osiguranje-vozila', element: <KaskoOsiguranje /> },
        { path: '/autoodgovornost', element: <Autoodgovornost /> },
        { path: '/pomoc-na-putu', element: <PomocNaPutu /> },
        { path: '/registracija-vozila', element: <RegistracijaVozila /> },

        { path: '/osiguranje-domacinstva', element: <Domacinstvo /> },

        { path: '/zivotno-osiguranje', element: <ZivotnoOsiguranje /> },
        { path: '/dobrovoljno-zdravstveno-osiguranje', element: <DobrovoljnoZdravstvenoOsiguranje /> },
        { path: '/osiguranje-od-nezgode', element: <OsiguranjeOdNezgode /> },

        { path: '/putno-osiguranje', element: <Putno /> },

        { path: '/naplata-naknada-stete', element: <NaplataStete /> },

        { path: '/politika-privatnosti', element: <PolitikaPrivatnosti /> },
      ],
    },
  ]);

  return <Fragment>{screenLoading ? <Preloader /> : <RouterProvider router={router} />}</Fragment>;
}

export default App;
